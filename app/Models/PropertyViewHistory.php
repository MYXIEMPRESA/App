<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyViewHistory extends Model
{
    use HasFactory;

    protected $fillable = [ 'property_id', 'customer_id' ];

    protected $casts = [
        'property_id'      => 'integer',
        'customer_id'   => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }

    public function scopeWhoViewMyProperty($query)
    {
        $query = $query->whereHas('property', function ($q) {
            $q->active()->where('added_by', auth()->id());
        });

        return $query;
    }

    public function scopeViewInquiredProperty($query)
    {
        $query = $query->where('customer_id', auth()->id() )
                        ->whereHas('property', function ($q) {
                            $q->active();
                        });
        return $query;
    }
}
