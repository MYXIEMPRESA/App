<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAmenity extends Model
{
    use HasFactory;
    protected $fillable = [ 'property_id', 'amenity_id', 'value' ];

    protected $casts = [
        'property_id'   => 'integer',
        'amenity_id'    => 'integer',
    ];

    public function amenity()
    {
        return  $this->belongsTo(Amenity::class, 'amenity_id', 'id');
    }

    public function property()
    {
        return  $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
