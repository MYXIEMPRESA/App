<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Package extends Model implements HasMedia
{
    use HasFactory,  InteractsWithMedia;

    protected $fillable=[ 'name', 'duration_unit', 'duration', 'price', 'property', 'add_property', 'advertisement', 'property_limit', 'add_property_limit', 'advertisement_limit', 'description', 'status' ];

    protected $casts = [
        'duration'      => 'integer',
        'price'         => 'double',
        'property'      => 'integer',
        'add_property'  => 'integer',
        'advertisement' => 'integer',
        'property_limit'=> 'integer',
        'add_property_limit'  => 'integer',
        'advertisement_limit' => 'integer'
    ];
}
