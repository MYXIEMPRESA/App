<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyViewHistory;
use App\Models\Property;
use App\Models\User;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\PropertyDetailResource;
use App\Http\Resources\PropertyAmenityResource;

class PropertyViewHistoryController extends Controller
{
    public function inqueryForProperty(Request $request) {
        $user = auth()->user();

        $property = Property::where('id', request('property_id'))->first();

        if( $property == null ){
            $message = __('message.not_found_entry', [ 'name' => __('message.property') ]);
            return json_message_response($message, 400);
        }
        $property_amenity = $property->propertyAmenity->where('property_id', $property->id );
        $property_amenity_value = PropertyAmenityResource::collection($property_amenity);
        $property_inquiry = PropertyViewHistory::where('property_id', $property->id)->where('customer_id', $user->id)->exists();
        $customer = User::where('id', $property->added_by)->first();

        if( $property_inquiry ) {
            $response = [ 
                'data' => new PropertyDetailResource($property),
                'property_amenity_value' => $property_amenity_value,
                'customer' =>  isset($customer) ? new CustomerResource($customer) : null,
            ];
            return json_custom_response($response);
        }
        $subscription_system = (int) SettingData('subscription', 'subscription_system') ?? 0;
        if( $subscription_system )
        {
            if (!$user->is_subscribe ) {
                $message = __('message.you_have_not_subsctibe_plan');
                return json_message_response($message, 400);
            }

            if( optional($user->subscriptionPackage)->package_data['property'] == 0 )
            {
                if ( $user->view_limit_count == 0 ) {
                    $message = __('message.limit_exceed', [ 'name' => __('message.view_property') ]);
                    return json_message_response($message, 400);
                } else {
                    PropertyViewHistory::create([
                        'property_id'   => $property->id,
                        'customer_id'   => $user->id,
                    ]);
                    $user->decrement('view_limit_count');
                }
            } else {
                PropertyViewHistory::create([
                    'property_id'   => $property->id,
                    'customer_id'   => $user->id,
                ]);
            }
        }

        $response = [
            'data'      => new PropertyDetailResource($property),
            'property_amenity_value' => $property_amenity_value,
            'customer'  =>  isset($customer) ? new CustomerResource($customer) : null,
        ];
        return json_custom_response($response);

    }
}
