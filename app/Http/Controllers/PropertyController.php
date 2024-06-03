<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\CategoryAmenityMapping;
use App\DataTables\PropertyDataTable;
use App\Http\Requests\PropertyRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PropertyExport;
use App\Imports\ImportProperty;
use App\Models\PropertyAmenity;
use App\DataTables\AdvertisementPropertyDataTable;
use App\Models\User;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PropertyDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.property')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        $params = null;

        $params['category'] = Category::where('id',request('category'))->first() ?? null;
        $params['start_price'] = request('start_price') ?? null;
        $params['end_price'] = request('end_price') ?? null;
        $params['start_age_of_property'] = request('start_age_of_property') ?? null;
        $params['end_age_of_property'] = request('end_age_of_property') ?? null;
        $params['start_brokerage'] = request('start_brokerage') ?? null;
        $params['end_brokerage'] = request('end_brokerage') ?? null;
        $params['city'] = request('city') ?? null;
        $params['bhk'] = request('bhk') ?? null;
        $params['property_for'] = request('property_for') ?? null;
        $params['furnished_type'] = request('furnished_type') ?? null;

        $filter_file_button = '<a href="'.route('filter.property.data', $params).'" class="float-right mr-1 btn btn-sm btn-success loadRemoteModel"><i class="fas fa-filter"></i> '.__('message.filter').'</a>';
        $button = $auth_user->can('property-add') ? '<a href="'.route('property.create').'" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.property')]).'</a>' : '';
        $import_file_button = $auth_user->can('property-add') ? '<a href="'.route('import.property.csv').'" class="float-right mr-1 btn btn-sm btn-primary loadRemoteModel"><i class="fas fa-file-import"></i> '.__('message.import_property').'</a>' : '';
        $download_file_button = '<a href="'.route('download.property.csv').'" class="float-right mr-1 btn btn-sm btn-secondary"><i class="fas fa-file-download"></i> '.__('message.download_property_csv').'</a>';
        $reset_file_button = '<a href="'.route('property.index').'" class="float-right mr-1 btn btn-sm btn-danger"><i class="ri-repeat-line" style="font-size:12px"></i> '.__('message.reset_filter').'</a>';
        $pdfbutton = '<a href="'.route('download.Property.list').'" class="float-right mr-1 btn btn-sm btn-info"><i class="fas fa-file-csv"></i> '.__('message.csv').'</a>';
        $delete_checkbox_checkout = $auth_user->can('property-delete') ? '<button id="deleteSelectedBtn" checked-title = "property-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';

        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','download_file_button','pdfbutton','import_file_button','filter_file_button','reset_file_button','delete_checkbox_checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.property')]);
        $assets = ['map'];
        return view('property.form', compact('pageTitle','assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $user = auth()->user();
        $data = $request->all();
        $data['added_by'] = $user->id;

        $data['price_duration'] = in_array(request('property_for'), [0,2]) ? request('price_duration') : null;
        
        if(request()->is('api/*')){

            $subscription_system = (int) SettingData('subscription', 'subscription_system') ?? 0;

            if( $subscription_system )
            {
                if (!$user->is_subscribe ) {
                    $message = __('message.you_have_not_subsctibe_plan');
                    return json_message_response($message, 400);
                }
                
                if( optional($user->subscriptionPackage)->package_data['add_property'] == 0 )
                {
                    if ( $user->add_limit_count == 0 ) {
                        $message = __('message.limit_exceed', [ 'name' => __('message.property') ]);
                        return json_message_response($message, 400);
                    }
                }
            }

        }
        $result = Property::create($data);

        if(request()->is('api/*')) {

            if( $subscription_system )
            {
                if( optional($user->subscriptionPackage)->package_data['add_property'] == 0 )
                {
                    if ( $user->add_limit_count == 0 ) {
                        $message = __('message.limit_exceed', [ 'name' => __('message.property') ]);
                        return json_message_response($message, 400);
                    } else {
                        $user->decrement('add_limit_count');
                    }
                }
            }
        }

        uploadMediaFile($result, $request->property_image, 'property_image');
        uploadMediaFile($result, $request->property_gallary, 'property_gallary');

        if ( $result->category_id != null ) {
            $amenity = CategoryAmenityMapping::where('category_id', $result->category_id)->get();

            if ( count($amenity) > 0 ) {
                foreach ($amenity as $value) {
                    $amenity_value = $value->amenity_id;

                    if ($request->has('amenity_' . $amenity_value) && $request->input('amenity_'. $amenity_value) != '') {
                        $property_amenity = new PropertyAmenity;
                        $property_amenity->value = is_array($request->input('amenity_'.$amenity_value)) ? json_encode($request->input('amenity_'.$amenity_value), true) : ($request->input('amenity_'.$amenity_value));
                        $property_amenity->amenity_id = $amenity_value;
                        $property_amenity->property_id = $result->id;
                        $property_amenity->save();
                    }
                }
            }
        }

        $message = __('message.save_form', ['form' => __('message.property')]);

        if(request()->is('api/*')){
            return response()->json(['status' => true, 'property_id' => $result->id , 'message' => $message ]);
        }
        return redirect()->route('property.index')->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ( request('type') == 'customer' ) {
            $data = User::where('user_type','user')->findOrFail($id);
            if ($data->is_agent == null && $data->is_builder == null) {
                return redirect()->route('customer.show', ['id' => $data->id, 'type' => 'property']);
            }
    
            if ($data->is_agent == 1) {
                return redirect()->route('agent.show', ['id' => $data->id, 'type' => 'property']);
            }
    
            if ($data->is_builder == 1) {
                return redirect()->route('builder.show', ['id' => $data->id, 'type' => 'property']);
            }
        }

        $pageTitle = __('message.detail_form_title',['form' => __('message.property')]);
        $data = Property::findOrFail($id);
        $assets = ['map'];

        return view('property.show', compact('data', 'pageTitle', 'id','assets'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.property')]);
        $data = Property::findOrFail($id);
        $assets = ['map'];
        return view('property.form', compact('data', 'pageTitle', 'id','assets'));

        return response()->json('amenity_data');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, $id)
    {

        $property = Property::find($id);
        
        $message = __('message.not_found_entry', ['name' => __('message.property')]);
        if($property == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }

        $request['price_duration'] = in_array(request('property_for'), [0,2]) ? request('price_duration') : null;
        // Property data...
        $property->fill($request->all())->update();

        //PropertyAmenity Data...
        if ( $property->category_id != null ) {
            PropertyAmenity::where('property_id',$property->id)->delete();
            $amenity = CategoryAmenityMapping::where('category_id', $property->category_id)->get();

            if ( count($amenity) > 0 ) {
                foreach ($amenity as $value) {
                    $amenity_value = $value->amenity_id;

                    if ($request->has('amenity_' . $amenity_value) && $request->input('amenity_'. $amenity_value) != '') {
                        $property_amenity = new PropertyAmenity;
                        $property_amenity->value = is_array($request->input('amenity_'.$amenity_value)) ? json_encode($request->input('amenity_'.$amenity_value), true) : ($request->input('amenity_'.$amenity_value));
                        $property_amenity->amenity_id = $amenity_value;
                        $property_amenity->property_id = $property->id;
                        $property_amenity->save();
                    }
                }
            }
        }
        
        // Save amenity amenity_image...
        if (isset($request->property_image) && $request->property_image != null) {
            $property->clearMediaCollection('property_image');
            $property->addMediaFromRequest('property_image')->toMediaCollection('property_image');
        }
        
        if($request->hasFile('property_gallary')) {
            $property->clearMediaCollection('property_gallary');
            foreach($request->file('property_gallary') as $image) {
                $property->addMedia($image)->toMediaCollection('property_gallary');
            }
        }

        $message = __('message.update_form',['form' => __('message.property') ] );

        if(request()->is('api/*')){
            return response()->json(['status' =>  (($property != '') ? true : false) , 'message' => $message ]);
        }

        if(auth()->check()){
            return redirect()->route('property.index')->withSuccess($message);
        }
        return redirect()->back()->withSuccess();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(env('APP_DEMO')){
            $message = __('message.demo_permission_denied');
            if(request()->ajax()) {
                return response()->json(['status' => false, 'message' => $message, 'event' => 'validation']);
            }
            return redirect()->route('property.index')->withErrors($message);
        }


        $property = Property::find($id);
        $status = 'errors';
        $message = __('message.not_found_entry', ['name' => __('message.property')]);

        if($property != '') {
            $property->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.property')]);
        }

        if(request()->is('api/*')){
                return response()->json(['status' =>  (($property != '') ? true : false) , 'message' => $message ]);
        }
        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }

    public function getCategoryAmenity(Request $request){

        $property_id = $request->id;

        $data = [];
        $property = null;
        if( $property_id != null ) {
            $property = Property::findOrFail($property_id);
        }
        
        $category = CategoryAmenityMapping::where('category_id' ,'=' ,$request->category_id)
                    ->whereHas('amenity', function ($query) {
                        $query->where('status', 1);
                    })
                    ->get();
        foreach($category as $item){
            $amt = Amenity::where('id', $item->amenity_id)->where('status', 1)->first();

            if ( $property != null ) {
                $property_amenity = $property->propertyAmenity()->where('amenity_id',$item->amenity_id)->first();
                if ( $property_amenity != null && $property_amenity->value != null ) {
                    $amt['property_amenity'] = in_array($amt->type, ['checkbox']) ? json_decode($property_amenity->value, true) : $property_amenity->value;
                } else {
                    $amt['property_amenity'] = in_array($amt->type, ['checkbox']) ? [] : null;
                }
            } else {
                $amt['property_amenity'] = in_array($amt->type, ['checkbox']) ? [] : null;
            }
            
            if ( optional($item->amenity) != null ) {
                $amenity = collect($item->amenity->value)->mapWithKeys(function ($item1) {
                    return [ $item1 => $item1 ];
                });
                $amt['amenity_value'] = $amenity;
            } else {
                $amt['amenity_value'] = [];
            }
            $data[] = $amt;
        }

        $view = view('property.property-amenity', compact('data','property_id'))->render();
        return response()->json([ 'data' => $view ]);
    }
    function downloadPropertyCSV() {
        $file = public_path(). "/download/property.csv";
  
        return Response::download($file);
    }
    public function downloadPropertyList(Request $request)
    {        
        return Excel::download(new PropertyExport ,  'property-'.date('Ymd_H_i_s').'.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    public function importPropertyForm(Request $request)
    {    
        $title = __('message.import_property');
        
        return view('property.import',compact([ 'title' ]));
    }
    public function importProperty(Request $request)
    {    
        Excel::import(new ImportProperty, $request->file('property_file')->store('files'));
        $message = __('message.save_form', ['form' => __('message.property')]);
        return response()->json(['status' => true, 'event' => 'submited','message' => $message]);
    }
    public function filterProperty()
    {
        $pageTitle = __('message.filter_property');
        $params = null;

        $params['category'] = Category::where('id',request('category'))->first() ?? null;
        $params['start_price'] = request('start_price') ?? null;
        $params['end_price'] = request('end_price') ?? null;
        $params['start_age_of_property'] = request('start_age_of_property') ?? null;
        $params['end_age_of_property'] = request('end_age_of_property') ?? null;
        $params['start_brokerage'] = request('start_brokerage') ?? null;
        $params['end_brokerage'] = request('end_brokerage') ?? null;
        $params['city'] = request('city') ?? null;
        $params['bhk'] = request('bhk') ?? null;
        $params['property_for'] = request('property_for') ?? null;
        $params['furnished_type'] = request('furnished_type') ?? null;

        return view('property.filterproperty', compact('pageTitle')+$params);
    }

    public function advertisementPropertyList(AdvertisementPropertyDataTable $dataTable)
    {    
        $pageTitle = __('message.list_form_title',['form' => __('message.advertisement_property')] );
        $button = '';
        $city = request('city') ?? null;
        $customer = User::where('user_type','user')->where('id',request('customer'))->first() ?? null;
        return $dataTable->render('global.advertisement-property-datatable', compact('pageTitle','button','city','customer'));
    }
}
