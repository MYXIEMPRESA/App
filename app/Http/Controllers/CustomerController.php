<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Subscription;
use App\DataTables\CustomerDataTable;
use App\DataTables\PropertyDataTable;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;
use App\Imports\ImportCustomer;
use App\Models\Role;
use App\DataTables\SubscriptionDataTable;
use App\Traits\SubscriptionTrait;
use App\DataTables\ExtraPropertyLimitTransactionDataTable;

class CustomerController extends Controller
{
    use SubscriptionTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.customer')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        $type['type'] = 'customer';

        $delete_checkbox_checkout = $auth_user->can('customer-delete') ? '<button id="deleteSelectedBtn" checked-title = "customer-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        // $import_file_button = $auth_user->can('customer-add') ? '<a href="'.route('import.customer.csv',$type).'" class="float-right mr-1 btn btn-sm btn-primary loadRemoteModel"><i class="fas fa-file-import"></i> '.__('message.import_'.''.$type['type']).'</a>' : '';
        // $download_file_button = '<a href="'.route('download.customer.csv',$type).'" class="float-right mr-1 btn btn-sm btn-secondary"><i class="fas fa-file-download"></i> '.__('message.download_customer_csv').'</a>';
        $pdfbutton = '<a href="'.route('download.customer.list',$type).'" class="float-right mr-1 btn btn-sm btn-info"><i class="fas fa-file-csv"></i> '.__('message.csv').'</a>';
        $button = '';

        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','pdfbutton','delete_checkbox_checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.customer')]);
        $assets = ['phone'];
        $roles = Role::where('status', 1)->whereNotIn('name', ['admin'])->get()->pluck('name', 'name');

        return view('customer.form', compact('pageTitle','assets','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $message= 'true';
        $request['password'] = bcrypt($request->password);
        $request['username'] = $request->username ?? stristr($request->email, "@", true) . rand(100,1000);      
        $request['display_name'] = $request['first_name']." ".$request['last_name'];

        $customer = User::create($request->all());
        uploadMediaFile($customer,$request->profile_image, 'profile_image');
        $customer->assignRole($request->user_type);

        if(request()->is('api/*')){
            return json_message_response(['message'=> $message , 'status' => true]);
        }
        return redirect()->route('customer.index')->withSuccess(__('message.save_form', ['form' => __('message.customer')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyDataTable $dataTable, SubscriptionDataTable $subscriptiondataTable,ExtraPropertyLimitTransactionDataTable $extraPropertylimittransactiondataTable, $id)
    {
        $data = User::where('user_type', 'user')->whereNULL('is_agent')->whereNULL('is_builder')->findOrFail($id);
        $pageTitle = $data->display_name.' '.__('message.profile');
        $profileImage = getSingleMedia($data, 'profile_image');
        $data->subscription_system = (int) SettingData('subscription', 'subscription_system') ?? 0;
        
        $type = request('type') ?? 'detail';
        
        switch ($type) {
            case 'property':
                return $dataTable->with('user_id',$id)->render('customer.show', compact('pageTitle', 'type', 'data'));
                break;
            
            case 'subscription':
                return $subscriptiondataTable->with('user_id',$id)->render('customer.show', compact('pageTitle', 'type', 'data'));
                break;

            case 'extrapropertylimit':
                return $extraPropertylimittransactiondataTable->with('user_id',$id)->render('customer.show', compact('pageTitle', 'type', 'data'));
                break;
            
            default:
                # code...
                $subscription_data = $data->allSubscriptionPlan()->latest()->first();
                
                if( $data->subscription_system && isset($subscription_data) && $subscription_data['status'] == 'active' ) {
                    
                    $extra_for_all = $data->extraPropertyLimitTransaction()->where('subscription_id', optional($data->subscriptionPackage)->id)->where('status', 'active')->where('extra_property_type', 'all')->sum('limit');

                    if( $subscription_data['package_data']['add_property'] == 0 )
                    {
                        $extra_add_property = $data->extraPropertyLimitTransaction()->where('subscription_id', optional($data->subscriptionPackage)->id)->where('status', 'active')->where('extra_property_type', 'add_property')->sum('limit');
                        $data->with_extra_add_property_limit = $subscription_data['package_data']['add_property_limit'] + $extra_for_all + $extra_add_property;
                    }

                    if( $subscription_data['package_data']['advertisement'] == 0 )
                    {
                        $extra_advertisement_property = $data->extraPropertyLimitTransaction()->where('subscription_id', optional($data->subscriptionPackage)->id)->where('status', 'active')->where('extra_property_type', 'advertisement_property')->sum('limit');
                        $data->with_extra_advertisement_limit =  $subscription_data['package_data']['advertisement_limit'] + $extra_for_all + $extra_advertisement_property;
                    }

                    if( $subscription_data['package_data']['property'] == 0 )
                    {
                        $extra_view_property = $data->extraPropertyLimitTransaction()->where('subscription_id', optional($data->subscriptionPackage)->id)->where('status', 'active')->where('extra_property_type', 'view_property')->sum('limit');
                        $data->with_extra_property_limit = $subscription_data['package_data']['property_limit'] + $extra_for_all + $extra_view_property;
                    }
                }
                $data->subscription_data = $subscription_data;
                break;
            }
        return $dataTable->with('user_id',$id)->render('customer.show', compact('pageTitle', 'data', 'type', 'profileImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.customer')]);
        $data = User::findOrFail($id);
        $profileImage = getSingleMedia($data, 'profile_image');
        $assets = ['phone'];
        $roles = Role::where('status', 1)->whereNotIn('name', ['admin'])->get()->pluck('name', 'name');

        return view('customer.form', compact('data', 'pageTitle', 'id', 'assets','roles','profileImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $customer = User::find($id);

        $request['password'] = $request->password != '' ? bcrypt($request->password) : $customer->password;
        $request['display_name'] = $request['first_name']." ".$request['last_name'];

        $customer->removeRole($customer->user_type);
        $message = __('message.not_found_entry', ['name' => __('message.customer')]);
        if($customer == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }

        $customer->fill($request->all())->update();

        if (isset($request->profile_image) && $request->profile_image != null) {
            $customer->clearMediaCollection('profile_image');
            $customer->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }

        $customer->assignRole($request['user_type']);

        $message = __('message.update_form',[ 'form' => __('message.customer') ]);
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($customer != '') ? true : false) , 'message' => $message ]);
        }
        if(auth()->check()){
           return redirect()->route('customer.index')->withSuccess($message);
        }
        return redirect()->route('customer.index')->withSuccess($message);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = User::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.customer')]);

        if($customer != '') {
            $customer->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.customer')]);
        }
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($customer != '') ? true : false) , 'message' => $message ]);
        }       

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
    function downloadCustomerCSV(Request $request) {

        $file = public_path(). "/download/$request->type.csv";
        return Response::download($file);
    }
    public function downloadCustomerList(Request $request)
    {        
        $download_user_list = Excel::download(new CustomerExport($request->type),$request->type.'-'.date('Ymd_H_i_s').'.csv', \Maatwebsite\Excel\Excel::CSV);
        return $download_user_list;

    }
    public function importCustomerForm(Request $request)
    {    
        $title = __('message.import_'.''.$request->type);
        $user_types['type'] = $request->type;
        return view('customer.import',compact([ 'title' ,'user_types']));
    }
    public function importCustomer(Request $request)
    {

        if($request->type == 'customer'){
            Excel::import(new ImportCustomer, $request->file('customer_file')->store('files'));
        }
        return response()->json(['status' => true, 'event' => 'refresh']);
    }
}
