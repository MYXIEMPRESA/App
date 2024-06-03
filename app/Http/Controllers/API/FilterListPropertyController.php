<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Carbon;
use App\Http\Resources\PropertyResource;

class FilterListPropertyController extends Controller
{
    public function filterPropertyList(Request $request)
    {
        $query = Property::active()->otherProperty();

        $query->when(request('city') != null, function ($q) {
            return $q->where('city', request('city'));
        });
        
        $query->when(request('category_id') != null, function ($q) {
            return $q->where('category_id', request('category_id'));
        });
        
        $query->when(request('start_price') != null, function ($q) {
            return $q->where('price', '>=', request('start_price'));
        });
        
        $query->when(request('end_price') != null, function ($q) {
            return $q->where('price', '<=', request('end_price'));
        });
        
        $query->when(request('bhk') != null, function ($q) {
            return $q->where('bhk', request('bhk'));
        });
        
        $query->when(request('furnished_type') != null, function ($q) {
            return $q->where('furnished_type', request('furnished_type'));
        });
        
        $query->when(request('property_for') != null, function ($q) {
            return $q->where('property_for', request('property_for'));
        });
        
        $query->when(request('start_age_of_property') != null, function ($q) {
            return $q->where('age_of_property', '>=', request('start_age_of_property'));
        });
        
        $query->when(request('end_age_of_property') != null, function ($q) {
            return $q->where('age_of_property', '<=', request('end_age_of_property'));
        });
        
        $query->when(request('start_brokerage') != null, function ($q) {
            return $q->where('brokerage', '>=', request('start_brokerage'));
        });
        
        $query->when(request('end_brokerage') != null, function ($q) {
            return $q->where('brokerage', '<=', request('end_brokerage'));
        });
        
        $query->when(request('start_security_deposit') != null, function ($q) {
            return $q->where('security_deposit', '>=', request('start_security_deposit'));
        });
        
        $query->when(request('end_security_deposit') != null, function ($q) {
            return $q->where('security_deposit', '<=', request('end_security_deposit'));
        });
        
        $query->when(request('posted_since') != null, function ($q) {
            if (request('posted_since') == 'yesterday') {
                return $q->where('created_at', '>=', Carbon::yesterday());
            }
            if (request('posted_since') == 'lastweek') {
                return $q->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)]);
            }
        });

        $query->when(request('advertisement_property') != null, function ($q) {
            return $q->where('advertisement_property', request('advertisement_property'));
        });

        $query->when(request('saller_type') != null, function ($q) {
            return $q->where('saller_type', request('saller_type'));
        });

        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $query->count();
            }
        }

        $property = $query->orderBy('id', 'desc')->paginate($per_page);
        $items = PropertyResource::collection($property);
        $response = [
            'pagination'    => json_pagination_response($property),
            'property'      => $items,
        ];

        return json_custom_response($response);
    }
}
