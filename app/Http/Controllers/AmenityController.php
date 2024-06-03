<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\CategoryAmenityMapping;
use App\DataTables\AmenityDataTable;
use App\Http\Requests\AmenityRequest;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AmenityDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.amenity')] );
        $auth_user = authSession();
        if (!auth()->user()->can('amenity-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $delete_checkbox_checkout = $auth_user->can('amenity-delete') ? '<button id="deleteSelectedBtn" checked-title = "amenity-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        $button = $auth_user->can('amenity-add') ? '<a href="'.route('amenity.create').'" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.amenity')]).'</a>' : '';
        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','delete_checkbox_checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('amenity-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.amenity')]);
        
        return view('amenity.form', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmenityRequest $request)
    {
        if (!auth()->user()->can('amenity-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }

        if($request->type != "dropdown" && $request->type != "rediobutton" && $request->type != "checkbox"){
            $request['value'] = null;
        }

        if(request()->is('api/*')){
            $request['value'] = json_decode($request->value, true);
        }else{
            $request['value'] = $request->value;
        }

        $amenity = Amenity::create($request->all());
        uploadMediaFile($amenity,$request->amenity_image, 'amenity_image');

        $message = __('message.save_form', ['form' => __('message.amenity')]);
        
        if(request()->is('api/*')){
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->route('amenity.index')->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.amenity')]);
        $data = Amenity::findOrFail($id);

        return view('amenity.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('amenity-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.amenity')]);
        $data = Amenity::findOrFail($id);

        $value = collect($data->value)->mapWithKeys(function ($item) {
            return [ $item => $item];
        });

        return view('amenity.form', compact('data', 'pageTitle', 'id','value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AmenityRequest $request, $id)
    {
        if (!auth()->user()->can('amenity-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $amenity = Amenity::find($id);
        if($request->type != "dropdown" && $request->type != "rediobutton" && $request->type != "checkbox"){
            $request['value'] = null;
        }
        if(request()->is('api/*')){
            $request['value'] = json_decode($request->value, true);
        }else{
            $request['value'] = $request->value;
        }
        $message = __('message.not_found_entry', ['name' => __('message.amenity')]);
        if($amenity == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
    
        // Amenity data...
        $amenity->fill($request->all())->update();

        // Save amenity amenity_image...
        if (isset($request->amenity_image) && $request->amenity_image != null) {
            $amenity->clearMediaCollection('amenity_image');
            $amenity->addMediaFromRequest('amenity_image')->toMediaCollection('amenity_image');
        }
    
        $message = __('message.update_form',['form' => __('message.amenity')]);
        
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($amenity != '') ? true : false) , 'message' => $message ]);
        }

        if(auth()->check()){
            return redirect()->route('amenity.index')->withSuccess($message);
        }
        return redirect()->back()->withSuccess(__('message.update_form',['form' => __('message.amenity') ] ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!auth()->user()->can('amenity-delete')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $amenity = Amenity::find($id);
        $category_amenity = CategoryAmenityMapping::where('amenity_id', $id)->first();
        if (isset($category_amenity)){
            $status = 'error';
            $message = __('message.cannot_delete_associated');
        }else{
            $status = 'error';
            $message = __('message.not_found_entry', ['name' => __('message.amenity')]);
    
            if($amenity != '') {
                $amenity->delete();
                $status = 'success';
                $message = __('message.delete_form', ['form' => __('message.amenity')]);
            }
        }
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($amenity != '') ? true : false) , 'message' => $message ]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
}

