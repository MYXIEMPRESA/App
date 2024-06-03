<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use App\DataTables\BuilderDataTable;
use App\DataTables\PropertyDataTable;
use App\DataTables\SubscriptionDataTable;
use Illuminate\Support\Facades\Response;
use App\DataTables\ExtraPropertyLimitTransactionDataTable;

class BuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BuilderDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.builder')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        $type['type'] = 'builder';
        $delete_checkbox_checkout = $auth_user->can('builder-delete') ? '<button id="deleteSelectedBtn" checked-title = "builder-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyDataTable $dataTable, SubscriptionDataTable $subscriptiondataTable, ExtraPropertyLimitTransactionDataTable $extraPropertylimittransactiondataTable, $id)
    {
        $data = User::where('user_type','user')->where('is_builder',1)->findOrFail($id);
        $pageTitle = $data->display_name.' '.__('message.profile');
        $profileImage = getSingleMedia($data, 'profile_image');
        $data->subscription_system = (int) SettingData('subscription', 'subscription_system') ?? 0;
        
        $type = request('type') ?? 'detail';
        
        switch ($type) {
            case 'property':
                return $dataTable->with('user_id',$id)->render('builder.show', compact('pageTitle', 'type', 'data'));
                break;
            
            case 'subscription':
                return $subscriptiondataTable->with('user_id',$id)->render('builder.show', compact('pageTitle', 'type', 'data'));
                break;

            case 'extrapropertylimit':
                return $extraPropertylimittransactiondataTable->with('user_id',$id)->render('builder.show', compact('pageTitle', 'type', 'data'));
                break;
            
            default:
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
        return $dataTable->with('user_id',$id)->render('builder.show', compact('pageTitle', 'data', 'type', 'profileImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $builder = User::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.builder')]);

        if($builder != '') {
            $builder->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.builder')]);
        }
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($builder != '') ? true : false) , 'message' => $message ]);
        }       

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
}
