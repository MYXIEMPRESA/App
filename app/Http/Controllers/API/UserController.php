<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Password;
use App\Models\AppSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Traits\SubscriptionTrait;
use App\Http\Resources\CustomerResource;

class UserController extends Controller
{
    use SubscriptionTrait;
    public function register(UserRequest $request)
    {
        $input = $request->all();
                
        $password = $input['password'];
        $input['user_type'] = isset($input['user_type']) ? $input['user_type'] : 'user';
        $input['password'] = Hash::make($password);
        // dd($input);

        $input['display_name'] = $input['first_name']." ".$input['last_name'];
        $user = User::create($input);
        $user->assignRole($input['user_type']);

        $message = __('message.save_form',['form' => __('message.'.$input['user_type']) ]);
        $user->api_token = $user->createToken('auth_token')->plainTextToken;
        $user->profile_image = getSingleMedia($user, 'profile_image', null);
        $response = [
            'message' => $message,
            'data' => $user
        ];
        return json_custom_response($response);
    }

    public function userDetail(Request $request)
    {
        $id = auth()->id();

        $user = User::whereNotIn('user_type', ['admin'])->where('id',$id)->first();
        if(empty($user))
        {
            $message = __('message.not_found_entry',['name' =>__('message.user')]);
            return json_message_response($message,400);   
        }

        $response = [
            'data' => null,
        ];
        $user_detail = new UserResource($user);
        
        $subscription_data = $user->allSubscriptionPlan()->latest()->first();
        
        $plan_limit_count['total_property'] = $user->property()->count();
        $plan_limit_count['total_contact_view'] = $user->propertyViewHistory()->count();
        $plan_limit_count['total_advertisement_property'] = $user->userAdvertisementProperty()->count();
        
        $subscription_system = (int) SettingData('subscription', 'subscription_system') ?? 0;
        if( $subscription_system && isset($subscription_data) && $subscription_data['status'] == 'active' ) {
            
            $extra_for_all = $user->extraPropertyLimitTransaction()->where('subscription_id', optional($user->subscriptionPackage)->id)->where('status', 'active')->where('extra_property_type', 'all')->sum('limit');
            $plan_limit_count['extra_for_all'] = $extra_for_all;

            if( $subscription_data['package_data']['add_property'] == 0 )
            {
                $extra_add_property = $user->extraPropertyLimitTransaction()->where('subscription_id', optional($user->subscriptionPackage)->id)->where('status', 'active')->where('extra_property_type', 'add_property')->sum('limit');
                $plan_limit_count['with_extra_add_property_limit'] = $subscription_data['package_data']['add_property_limit'] + $extra_for_all + $extra_add_property;
                $plan_limit_count['remaining_add_property_limit'] = $plan_limit_count['with_extra_add_property_limit'] - $user->add_limit_count;
            }

            if( $subscription_data['package_data']['advertisement'] == 0 )
            {
                $extra_advertisement_property = $user->extraPropertyLimitTransaction()->where('subscription_id', optional($user->subscriptionPackage)->id)->where('status', 'active')->where('extra_property_type', 'advertisement_property')->sum('limit');
                $plan_limit_count['with_extra_advertisement_limit'] =  $subscription_data['package_data']['advertisement_limit'] + $extra_for_all + $extra_advertisement_property;
                $plan_limit_count['remaining_advertisement_property_limit'] = $plan_limit_count['with_extra_advertisement_limit'] - $user->advertisement_limit;
            }

            if( $subscription_data['package_data']['property'] == 0 )
            {
                $extra_view_property = $user->extraPropertyLimitTransaction()->where('subscription_id', optional($user->subscriptionPackage)->id)->where('status', 'active')->where('extra_property_type', 'view_property')->sum('limit');
                $plan_limit_count['with_extra_property_limit'] = $subscription_data['package_data']['property_limit'] + $extra_for_all + $extra_view_property;
                $plan_limit_count['remaining_view_property_limit'] = $plan_limit_count['with_extra_property_limit'] - $user->view_limit_count;
            }
        }
        
        $response = [
            'data' => $user_detail,
            'subscription_detail' => $this->subscriptionPlanDetail($user->id),
            'plan_limit_count' => $plan_limit_count,
        ];
        return json_custom_response($response);

    }

    public function customerDetail(Request $request)
    {
        $id = $request->id;

        $user = User::whereNotIn('user_type', ['admin'])->where('id',$id)->first();
        if(empty($user))
        {
            $message = __('message.not_found_entry',['name' =>__('message.user')]);
            return json_message_response($message,400);   
        }

        $response = [
            'data' => null,
        ];
        $user_detail = new CustomerResource($user);
        $response = [
            'data' => $user_detail,
        ];
        return json_custom_response($response);
    }


    public function updateProfile(UserRequest $request)
    {   
        $user = Auth::user();
        if($request->has('id') && !empty($request->id)){
            $user = User::where('id',$request->id)->first();
        }
        if($user == null){
            return json_message_response(__('message.no_record_found'),400);
        }

        $user->fill($request->all())->update();

        if(isset($request->profile_image) && $request->profile_image != null ) {
            $user->clearMediaCollection('profile_image');
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }

        $user_data = User::find($user->id);
        
        $message = __('message.updated');
        unset($user_data['media']);

        $user_resource = new UserResource($user_data);

        $response = [
            'data' => $user_resource,
            'message' => $message
        ];
        return json_custom_response( $response );
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if($request->is('api*')){
            $user->tokens('auth_token')->delete();
            $user->update([
                'player_id' => null,
            ]);
            return json_message_response(__('message.logout'));
        }
    }

    public function socialOTPLogin(Request $request)
    {
        $input = $request->all();

        $user_data = User::where('username', $input['username'])->where('login_type','mobile')->first();
                
        if( $user_data != null )
        {
            if( !in_array($user_data->user_type, ['admin',request('user_type')] )) {
                $message = __('auth.failed');
                return json_message_response($message,400);
            }

            if( $user_data->status == 'inactive' ) {
                $message = __('message.account_inactive');
                return json_message_response($message,400);
            }
            if( $user_data->status == 'banned' ) {
                $message = __('message.account_banned');
                return json_message_response($message,400);
            }
        
            if( !isset($user_data->login_type) || $user_data->login_type  == '' )
            {
                $message = __('validation.unique',['attribute' => 'username' ]);
                return json_message_response($message,400);
            }
            $message = __('message.login_success');
        }
        else
        {
            if($request->login_type === 'mobile' && $user_data == null ){
                $otp_response = [
                    'status' => true,
                    'is_user_exist' => false
                ];
                return json_custom_response($otp_response);
            }
            
            $validator = Validator::make($input,[
                'email' => 'required|email|unique:users,email',
                'username'  => 'required|unique:users,username',
                'contact_number' => 'max:20|unique:users,contact_number',
            ]);

            if ( $validator->fails() ) {
                $data = [
                    'status' => false,
                    'message' => $validator->errors()->first(),
                    'all_message' =>  $validator->errors()
                ];
    
                return json_custom_response($data, 422);
            }

            $password = !empty($input['accessToken']) ? $input['accessToken'] : $input['email'];

            $input['display_name'] = $input['first_name']." ".$input['last_name'];
            $input['password'] = Hash::make($password);
            $input['user_type'] = isset($input['user_type']) ? $input['user_type'] : 'user';
            $user = User::create($input);

            $user->assignRole($input['user_type']);

            $user_data = User::where('id',$user->id)->first();
            $message = __('message.save_form',['form' => $input['user_type'] ]);
        }
        $user_data->tokens('auth_token')->delete();
        $user_data['api_token'] = $user_data->createToken('auth_token')->plainTextToken;
        $user_data['profile_image'] = getSingleMedia($user_data, 'profile_image', null);

        $response = [
            'status'    => true,
            'message'   => $message,
            'data'      => $user_data
        ];
        return json_custom_response($response);
    }
    public function updateUserStatus(Request $request)
    {
        $user_id = $request->id ?? auth()->user()->id;
        
        $user = User::where('id',$user_id)->first();

        if($user == "") {
            $message = __('message.user_not_found');
            return json_message_response($message,400);
        }
        if($request->has('status')) {
            $user->status = $request->status;
        }
        
        if($request->has('latitude')) {
            $user->latitude = $request->latitude;
        }
        if($request->has('longitude')) {
            $user->longitude = $request->longitude;
        }

        if($request->has('player_id')) {
            $user->player_id = $request->player_id;
        }

        if($request->has('is_agent')) {
            $user->is_agent = $request->is_agent;
        }

        if($request->has('is_builder')) {
            $user->is_builder = $request->is_builder;
        }
        
        $user->save();
        $message = __('message.update_form',['form' => __('message.status') ]);
        $response = [
            'message' => $message
        ];
        return json_custom_response($response);
    }

    public function updateAppSetting(Request $request)
    {
        $data = $request->all();
        AppSetting::updateOrCreate(['id' => $request->id],$data);
        $message = __('message.save_form',['form' => __('message.app_setting') ]);
        $response = [
            'data' => AppSetting::first(),
            'message' => $message
        ];
        return json_custom_response($response);
    }

    public function getAppSetting(Request $request)
    {
        if($request->has('id') && isset($request->id)){
            $data = AppSetting::where('id',$request->id)->first();
        } else {
            $data = AppSetting::first();
        }

        return json_custom_response($data);
    }

    public function deleteUserAccount(Request $request)
    {
        $id = auth()->id();
        $user = User::where('id', $id)->first();
        $message = __('message.not_found_entry',['name' => __('message.account') ]);

        if( $user != '' ) {
            $user->delete();
            $message = __('message.account_deleted');
        }
        
        return json_custom_response(['message'=> $message, 'status' => true]);
    }
}
