<?php

namespace App\Traits;

use App\Models\Subscription;
use App\Http\Resources\SubscriptionResource;
use Carbon\Carbon;

trait SubscriptionTrait {

    public function get_user_active_subscription_plan($user_id)
    {
        $get_user_plan = Subscription::where('user_id', $user_id)->where('status', config('constant.SUBSCRIPTION_STATUS.ACTIVE'))->first();
        $activeplan = null; 
        if(!empty($get_user_plan)){
            $activeplan = new SubscriptionResource($get_user_plan);
        }
        return $activeplan;
    }

    public function is_subscribed_users($user_id)
    {
        return Subscription::where('user_id', $user_id)->where('status', config('constant.SUBSCRIPTION_STATUS.ACTIVE'))->exists();
    }

    public function get_plan_expiration_date($plan_start_date = '', $duration_unit = '', $left_days = 0, $plan_duration = 1)
    {
        $start_at = new Carbon($plan_start_date);
        $end_date = '';
        
        if($duration_unit === 'monthly'){
            $end_date =  $start_at->addMonths($plan_duration)->addDays($left_days);
        }
        if($duration_unit === 'yearly'){
            $end_date =  $start_at->addYears($plan_duration)->addDays($left_days);
        }
        return $end_date->format('Y-m-d H:i:s');
    }

    public function check_days_left_plan($previous_plan, $new_plan)
    {
        $previous_plan_end = new Carbon($previous_plan->subscription_end_date);
        $new_plan_start = new Carbon(date('Y-m-d H:i:s'));
        $left_days = $previous_plan_end->diffInDays($new_plan_start);
        return $left_days;
    }

    public function user_last_plan($user_id)
    {
        $user_subscribed = Subscription::where('user_id',$user_id)->where('status',config('constant.SUBSCRIPTION_STATUS.INACTIVE'))->orderBy('id','desc')->first();
        $inactivePlan = null;

        if(!empty($user_subscribed)) {
            $inactivePlan = new SubscriptionResource($user_subscribed);
        }
        return $inactivePlan;
    }

    public function is_plan_active($user_id){
        $is_subscribe = Subscription::where('user_id', $user_id)->where('status', config('constant.SUBSCRIPTION_STATUS.ACTIVE'))->exists();
        return $is_subscribe;
    }

    public function subscriptionPlanDetail($user_id)
    {
        $subscription_plan = $this->get_user_active_subscription_plan($user_id);
        $is_subscribed_users = $this->is_subscribed_users($user_id);
        if(!$this->is_plan_active($user_id) && !$is_subscribed_users) {
            $subscription_plan = $this->user_last_plan($user_id);
        }
        
        return [
            'is_subscribe' => (int) $is_subscribed_users,
            'subscription_plan' => $subscription_plan,
        ];
        
        return null;
    }

    public function setUserSubscriptionDetail($user, $package_data, $type = null)
    {
        $view_limit_count = $advertisement_limit = $add_limit_count = null;
        
        if ( $package_data['property'] == 0) {
            $view_limit_count = $package_data['property_limit'] ?? null;
        }

        if ( $package_data['add_property'] == 0) {
            $add_limit_count = $package_data['add_property_limit'] ?? null;
        }

        if ( $package_data['advertisement'] == 0) {
            $advertisement_limit = $package_data['advertisement_limit'] ?? null;
        }

        $update = [
            'view_limit_count'      => $view_limit_count,
            'add_limit_count'       => $add_limit_count,
            'advertisement_limit'   => $advertisement_limit,
        ];
        
        if( $type == 'subscription' ) {
            $update['is_subscribe'] = 1;
        }

        $user->update($update);
    }
}