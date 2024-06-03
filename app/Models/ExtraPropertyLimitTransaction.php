<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraPropertyLimitTransaction extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'extra_property_limit_id', 'amount', 'extra_property_type', 'limit', 'payment_type', 'payment_status', 'txn_id', 'other_transaction_detail', 'status', 'subscription_id', 'extra_property_limit_data' ];

    protected $casts = [
        'user_id' => 'integer',
        'amount'  => 'double',
        'limit'   => 'integer',
        'extra_property_limit_id'  => 'integer',
        'subscription_id' => 'integer',
    ];

    public function getExtraPropertyLimitDataAttribute($value)
    {
        return isset($value) ? json_decode($value, true) : null;
    }

    public function setExtraPropertyLimitDataAttribute($value)
    {
        $this->attributes['extra_property_limit_data'] = isset($value) ? json_encode($value) : null;
    }
}
