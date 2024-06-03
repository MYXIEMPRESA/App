<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Resources\SliderResource;

class SliderController extends Controller
{
    public function getList(Request $request)
    {
        $slider = Slider::where('status',1);
        
        $slider->whereHas('property', function ($q) {
            $q->active()->otherProperty()->when(request('city') != null, function ($q) {
                return $q->where('city', request('city'));
            });
        });
        
        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $slider->count();
            }
        }

        $slider = $slider->orderBy('id', 'asc')->paginate($per_page);

        $items = SliderResource::collection($slider);

        $response = [
            'pagination'    => json_pagination_response($items),
            'data'          => $items,
        ];
        
        return json_custom_response($response);
    }
}
