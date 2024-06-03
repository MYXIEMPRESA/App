<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Package;
use App\Models\User;
use App\Http\Resources\SubscriptionResource;
use App\Traits\SubscriptionTrait;

class SubscriptionController extends Controller
{
    use SubscriptionTrait;
    public function getList(Request $request)
    {
        $subscription = Subscription::mySubscription();

        $subscription->when(request('id'), function ($q) {
            return $q->where('id', 'LIKE', '%' . request('id') . '%');
        });
                
        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $subscription->count();
            }
        }

        $subscription = $subscription->orderBy('id', 'desc')->paginate($per_page);

        $items = SubscriptionResource::collection($subscription);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function subscriptionSave(Request $request)
    {
        $data = $request->all();

        $user_id = auth()->id();
        $user = User::where('id', $user_id)->first();
        $package_data = Package::where('id',$data['package_id'])->first();

        if(empty($package_data))
        {
            $message = __('message.not_found_entry', ['name' => __('message.package')]);
            return json_message_response($message,400);   
        }
        $get_existing_plan = $this->get_user_active_subscription_plan($user_id);
        
        $active_plan_left_days = 0;
        
        $data['user_id'] = $user_id;
        $data['status'] = config('constant.SUBSCRIPTION_STATUS.PENDING');
        $data['subscription_start_date'] = date('Y-m-d H:i:s');
        $data['total_amount'] = $package_data->price;

        if($get_existing_plan)
        {
            $get_existing_plan->update([
                'status' => config('constant.SUBSCRIPTION_STATUS.INACTIVE')
            ]);
            $get_existing_plan->save();
        }
        $data['subscription_end_date'] = $this->get_plan_expiration_date( $data['subscription_start_date'], $package_data->duration_unit, $active_plan_left_days, $package_data->duration );

        $data['package_data'] = $package_data ?? null;

        $subscription = Subscription::create($data);

        if( $subscription->payment_status == 'paid' ) {
            $subscription->status = config('constant.SUBSCRIPTION_STATUS.ACTIVE');
            $subscription->save();

            $subscription_package_data = $subscription->package_data;
            
            $this->setUserSubscriptionDetail($user, $subscription_package_data, 'subscription' );
        }

        $message = __('message.save_form', ['form' => __('message.subscription')]);
        
        return response()->json(['status' => true, 'message' => $message ]);
    }

    public function cancelSubscription(Request $request)
    {
        $user_id = auth()->id();
        $id = $request->id;
        $user_subscription = Subscription::where('id', $id )->where('user_id', $user_id)->first();
        $user = User::where('id', $user_id)->first();

        $message = __('message.not_found_entry',['name' => __('message.subscription')] );
        if($user_subscription)
        {
            $user_subscription->cancel_date = date('Y-m-d H:i:s');
            $user_subscription->status = config('constant.SUBSCRIPTION_STATUS.INACTIVE');
            $user_subscription->save();


            $user->update([
                'view_limit_count'      => null,
                'add_limit_count'       => null,
                'advertisement_limit'   => null,
                'is_subscribe'          => 0,
            ]);

            $user->extraPropertyLimitTransaction()->where('subscription_id', $user_subscription->id)->update([
                'status' => 'inactive'
            ]);
            $user->userAdvertisementProperty()->update([
                'advertisement_property'        => NULL,
                'advertisement_property_date'   => NULL,
            ]);
            
            $message = __('message.subscription_cancelled');
        }
        return json_message_response($message);
    }
}
