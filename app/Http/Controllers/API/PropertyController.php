<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\UserFavouriteProperty;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\PropertyInquiryResource;
use App\Http\Resources\PropertyDetailResource;
use App\Http\Resources\PropertyAmenityResource;
use App\Http\Resources\CustomerResource;
use App\Models\User;
use App\Models\PropertyViewHistory;
use App\Http\Resources\PropertyInquiryUserResource;
use Illuminate\Support\Facades\Http;

class PropertyController extends Controller
{
    public function getNearByPropertyList(Request $request)
    {

        $property = Property::active()->otherProperty();
        $latitude  = request('latitude');
        $longitude = request('longitude');

        if ( $latitude && $longitude ) {
            $property = $property->nearByProperty($latitude, $longitude);
        } else {
            $property->when(request('city') != null, function ($q) {
                return $q->where('city', request('city'));
            });
        }
        
        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $property->count();
            }
        }

        $property = $property->orderBy('id', 'asc')->paginate($per_page);
        $items = PropertyResource::collection($property);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function getList(Request $request)
    {
        $property = Property::active()->otherProperty();

        $property->when(request('city') != null, function ($q) {
            return $q->where('city', request('city'));
        });

        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $property->count();
            }
        }
        
        $property = $property->orderBy('id', 'asc')->paginate($per_page);
        $items = PropertyResource::collection($property);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function getUserFavouriteProperty(Request $request)
    {
        $property = Property::FavouiteProperty();

        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)) {
            if(is_numeric($request->per_page)) {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ) {
                $per_page = $property->count();
            }
        }

        $property = $property->orderBy('id', 'asc')->paginate($per_page);

        $items = PropertyResource::collection($property);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function userFavouriteProperty(Request $request)
    {
        $user_id = auth()->id();
        $property_id = $request->property_id;

        $property = Property::where('id', $property_id )->first();
        if( $property == null )
        {
            return json_message_response( __('message.not_found_entry',['name' => __('message.property') ]) );
        }
        $user_favourite_property = UserFavouriteProperty::where('user_id', $user_id)->where('property_id', $property_id)->first();
        
        if($user_favourite_property != null) {
            $user_favourite_property->delete();
            $message = __('message.unfavourite_property_list');
        } else {
            $data = [
                'user_id'      => $user_id,
                'property_id'   => $property_id,
            ];
            
            UserFavouriteProperty::create($data);
            $message = __('message.favourite_property_list');
        }

        return json_message_response($message);
    }
    public function searchLoction(Request $request)
    {
        $params = request('search');
        $per_page = is_numeric($request->per_page) ? $request->per_page : config('constant.PER_PAGE_LIMIT');
        $response['status'] = true;

        if (isset($params) && $params != null) {
            $property = Property::where('address', 'LIKE', '%' .  $params . '%');

            $property = $property->orderBy('id', 'asc')->paginate($per_page);
    
            $items = PropertyResource::collection($property);
    
            $response['data'] = $items;
            
        }else{
            $response['data'] = [];
        }

        $latitude = request('latitude');
        $longitude = request('longitude');

        $near_properties = [] ?? null;
        if ( $latitude && $longitude ) {
            $near_properties = Property::otherProperty()->nearByProperty($latitude, $longitude)->active()->paginate($per_page);
            $response['near_by_property'] = PropertyResource::collection($near_properties);
        }else{
            $response['near_by_property'] = [];
        }

        return json_custom_response($response);
    }
    
    public function getMyPropertyList(Request $request)
    {
        $property = Property::myProperty();

        $property->when(request('property_for') != null, function ($query) {
            return $query->where('property_for', request('property_for'));
        });
        
        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $property->count();
            }
        }

        $property = $property->orderBy('id', 'asc')->paginate($per_page);

        $items = PropertyResource::collection($property);

        $response = [
            'status'        => true,
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function getDetail(Request $request)
    {
        $property = Property::find($request->id);

        if( $property == null ){
            $message = __('message.not_found_entry', [ 'name' => __('message.property') ]);
            return json_message_response($message, 400);
        }
        $property->increment('total_view');
        $property_amenity = $property->propertyAmenity->where('property_id', $property->id );

        $property_amenity_value = PropertyAmenityResource::collection($property_amenity);
        $customer = User::where('id', $property->added_by)->first();
        
        $is_near_by_place = (int) SettingData('NEARBY', 'NEARBY_PLACE');
        $near_by_place = $is_near_by_place ? $this->nearByPlaces($property,$request) : [];
        $response = [
            'data' => new PropertyDetailResource($property),
            'property_amenity_value' => $property_amenity_value,
            'customer' =>  isset($customer) ? new CustomerResource($customer) : null,
            'near_by_place' => $near_by_place ?? [],
        ];
        return json_custom_response($response);
    }

    public function setPropertyAsAdvertisement(Request $request)
    {
        $user = auth()->user();
        $subscription_system = (int) SettingData('subscription', 'subscription_system') ?? 0;

        $property = Property::where('id', $request->id)->where('added_by',$user->id)->first();

        if( $property == null ){
            $message = __('message.not_found_entry', [ 'name' => __('message.property') ]);
            return json_message_response($message, 400);
        }

        if ( $property->advertisement_property ) {
            $message = __('message.property_already_as_advertisement');
            return json_message_response($message, 400);
        }

        if( $subscription_system )
        {
            if (!$user->is_subscribe ) {
                $message = __('message.you_have_not_subsctibe_plan');
                return json_message_response($message, 400);
            }

            if( optional($user->subscriptionPackage)->package_data['advertisement'] == 0 )
            {
                if ( $user->advertisement_limit == 0 ) {
                    $message = __('message.limit_exceed', [ 'name' => __('message.advertisement') ]);
                    return json_message_response($message, 400);
                }
            }
        }
        
        $property->update([
            'advertisement_property' => 1,
            'advertisement_property_date' => date('Y-m-d H:i:s'),
        ]);

        if( $subscription_system )
        {
            if( optional($user->subscriptionPackage)->package_data['advertisement'] == 0 )
            {
                if ( $user->advertisement_limit == 0 ) {
                    $message = __('message.limit_exceed', [ 'name' => __('message.advertisement') ]);
                    return json_message_response($message, 400);
                } else {
                    $user->decrement('advertisement_limit');
                }
            }
        }
        
        $response = [
            'message' => __('message.property_set_as_advertisement'),
            'data' => new PropertyDetailResource($property),
        ];
        return json_custom_response($response);
    }

    public function getMyAdvertisementProperty(Request $request)
    {
        $property = Property::myProperty()->where('added_by', auth()->id());

        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $property->count();
            }
        }

        $property = $property->orderBy('id', 'desc')->paginate($per_page);

        $items = PropertyResource::collection($property);

        $response = [
            'status'        => true,
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function whoInquiredMyProperty(Request $request)
    {
        $property_history = PropertyViewHistory::whoViewMyProperty();

        $property_history->when(request('customer_id') != null, function ($query) {
            return $query->where('customer_id', request('customer_id'));
        });
        
        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page))
        {   
            if( is_numeric($request->per_page) ) {
                $per_page = $request->per_page;
            }

            if( $request->per_page == -1 ){
                $per_page = $property_history->count();
            }
        }

        $property_history = $property_history->orderBy('id', 'desc')->paginate($per_page);

        $items = PropertyInquiryResource::collection($property_history);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function viewInquiryForProperty(Request $request)
    {
        $property_history = PropertyViewHistory::viewInquiredProperty();

        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page))
        {   
            if( is_numeric($request->per_page) ) {
                $per_page = $request->per_page;
            }

            if( $request->per_page == -1 ){
                $per_page = $property_history->count();
            }
        }

        $property_history = $property_history->orderBy('id', 'desc')->paginate($per_page);

        $items = PropertyInquiryResource::collection($property_history);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function whoInquiredMyPropertyUserList(Request $request)
    {
        $property_history = PropertyViewHistory::whoViewMyProperty()->distinct('customer_id');

        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page))
        {   
            if( is_numeric($request->per_page) ) {
                $per_page = $request->per_page;
            }

            if( $request->per_page == -1 ){
                $per_page = $property_history->count();
            }
        }

        $property_history = $property_history->orderBy('id', 'desc')->paginate($per_page);

        $items = PropertyInquiryUserResource::collection($property_history);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function getOthersAdvertisementProperty(Request $request)
    {
        $property = Property::otherAdvertiseProperty()->active();

        $property->when(request('city') != null, function ($q) {
            return $q->where('city', request('city'));
        });
        
        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $property->count();
            }
        }

        $property = $property->orderBy('advertisement_property_date', 'desc')->paginate($per_page);

        $items = PropertyResource::collection($property);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }

    public function delete($id) {

        $property = Property::myProperty()->where('id', $id)->first();

        $message = __('message.not_found_entry', [ 'name' => __('message.property') ]);
        $status = 400;
        
        if( $property != null ) {
            $property->delete();
            $message = __('message.delete_form', ['form' => __('message.property')]);
            $status = 200;
        }
        return json_message_response($message, $status);
    }

    public function nearByPlaces($property, $request)
    {
        $near_by_meters = SettingData('NEARBY', 'NEARBY_METER') ?? 500;
        $google_map_api_key = env('GOOGLE_MAP_KEY');
        $response = Http::get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' . $property->latitude . ',' . $property->longitude . '&radius='.$near_by_meters.'&key=' . $google_map_api_key);

        return $response->json();
    }
}
