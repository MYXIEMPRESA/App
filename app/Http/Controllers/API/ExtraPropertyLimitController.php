<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtraPropertyLimit;
use App\Http\Resources\ExtraPropertyLimitResource;
use App\Models\User;
use App\Models\ExtraPropertyLimitTransaction;
use App\Http\Resources\UserResource;

class ExtraPropertyLimitController  extends Controller
{
    public function getList(Request $request)
    {
        $extrapropertylimit = ExtraPropertyLimit::query();

        $extrapropertylimit->when(request('type'), function ($q) {
            return $q->where('type', request('type'));
        });
                
        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $extrapropertylimit->count();
            }
        }

        $extrapropertylimit = $extrapropertylimit->orderBy('id', 'desc')->paginate($per_page);

        $items = ExtraPropertyLimitResource::collection($extrapropertylimit);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function purchaseExtraLimit(Request $request)
    {
        $data = $request->all();

        $user_id = auth()->id();
        $user = User::where('id', $user_id)->first();

        if ($user->is_subscribe == 0) {
            $message = __('message.not_found_entry',['name' => __('message.subscription')] );
            return json_message_response($message, 400);
        }

        $extra_property_limit_data = ExtraPropertyLimit::where('id', request('extra_property_limit_id'))->first();
        
        if(empty($extra_property_limit_data))
        {
            $message = __('message.not_found_entry', ['name' => __('message.extrapropertylimit')]);
            return json_message_response($message,400);   
        }

        switch ($extra_property_limit_data->type) {
            case 'add_property':
                if( optional($user->subscriptionPackage)->package_data['add_property'] == 1 ) {
                    $message = __('message.your_plan_limit_unlimited');
                    return json_message_response($message,400);   
                }
                break;
            case 'view_property':
                if( optional($user->subscriptionPackage)->package_data['property'] == 1 ) {
                    $message = __('message.your_plan_limit_unlimited');
                    return json_message_response($message,400);   
                }
                break;
            case 'advertisement_property':
                if( optional($user->subscriptionPackage)->package_data['advertisement'] == 1 ) {
                    $message = __('message.your_plan_limit_unlimited');
                    return json_message_response($message,400);   
                }
                break;
            default:
                if( optional($user->subscriptionPackage)->package_data['add_property'] == 1 ) {
                    $message = __('message.your_plan_limit_unlimited');
                    return json_message_response($message,400);   
                }

                if( optional($user->subscriptionPackage)->package_data['property'] == 1 ) {
                    $message = __('message.your_plan_limit_unlimited');
                    return json_message_response($message,400);   
                }

                if( optional($user->subscriptionPackage)->package_data['advertisement'] == 1 ) {
                    $message = __('message.your_plan_limit_unlimited');
                    return json_message_response($message,400);   
                }
                
                break;
        }
        $data['user_id'] = $user_id;
        $data['extra_property_type'] = $extra_property_limit_data->type;
        $data['amount'] = $extra_property_limit_data->price;
        $data['limit'] = $extra_property_limit_data->limit;
        $data['extra_property_limit_data'] = $extra_property_limit_data ?? null;
        $data['status'] = 'inactive';
        $data['subscription_id'] = optional($user->subscriptionPackage)->id;
        $result = ExtraPropertyLimitTransaction::create($data);

        if( $result->payment_status == 'paid' ) {
            $result->status = 'active';
            $result->save();
            switch ($result->extra_property_type) {
                case 'add_property':
                    if( $user->add_limit_count == null ) {
                        $user->update([
                            'add_limit_count' => $result->limit
                        ]);
                    } else {
                        $user->increment('add_limit_count', $result->limit);
                    }
                    break;

                case 'view_property':
                    if( $user->view_limit_count == null ) {
                        $user->update([
                            'view_limit_count' => $result->limit
                        ]);
                    } else {
                        $user->increment('view_limit_count', $result->limit);
                    }
                    break;

                case 'advertisement_property':
                    if( $user->advertisement_limit == null ) {
                        $user->update([
                            'advertisement_limit' => $result->limit
                        ]);
                    } else {
                        $user->increment('advertisement_limit', $result->limit);
                    }
                    break;

                default:
                    if( $user->add_limit_count == null ) {
                        $user->update([
                            'add_limit_count' => $result->limit
                        ]);
                    } else {
                        $user->increment('add_limit_count', $result->limit);
                    }

                    if( $user->view_limit_count == null ) {
                        $user->update([
                            'view_limit_count' => $result->limit
                        ]);
                    } else {
                        $user->increment('view_limit_count', $result->limit);
                    }

                    if( $user->advertisement_limit == null ) {
                        $user->update([
                            'advertisement_limit' => $result->limit
                        ]);
                    } else {
                        $user->increment('advertisement_limit', $result->limit);
                    }
                break;
            }
        }
                
        $response = [
            'data' => new UserResource($user),
        ];

        return json_custom_response($response);
    }
}
