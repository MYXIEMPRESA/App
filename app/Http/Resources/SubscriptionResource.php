<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource  extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return [
            'id'                  => $this->id,
            'user_id'             => $this->user_id,
            'user_name'           => optional($this->user)->display_name,
            'package_id'          => $this->package_id,
            'package_name'        => optional($this->package)->name,
            'total_amount'        => $this->total_amount,
            'payment_type'        => $this->payment_type,
            'txn_id'              => $this->txn_id,
            'transaction_detail'  => $this->transaction_detail,
            'payment_status'      => $this->payment_status,
            'status'            => $this->status,
            'package_data'      => $this->package_data,
            'subscription_start_date'  => $this->subscription_start_date,
            'subscription_end_date'    => $this->subscription_end_date,
            'cancel_date'         => $this->cancel_date,
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
        ];
    }
}