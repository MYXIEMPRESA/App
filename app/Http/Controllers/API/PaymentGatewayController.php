<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentGateway;
use App\Http\Resources\PaymentGatewayResource;

class PaymentGatewayController extends Controller
{

    public function getList(Request $request)
    {
        $gateways = PaymentGateway::where('status',1);
        $per_page = is_numeric(request('per_page')) ? request('per_page') : config('constant.PER_PAGE_LIMIT');

        $gateways = $gateways->where('type','!=', 'cash' )->orderBy('title','asc')->paginate($per_page);
        $items = PaymentGatewayResource::collection($gateways);

        $response = [
            'pagination' => json_pagination_response($items),
            'data' => $items,
        ];
        
        return json_custom_response($response);
    }
}
