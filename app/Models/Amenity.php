<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Amenity extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [ 'name', 'status', 'type', 'value' ];

    public function getValueAttribute($value)
    {
        return isset($value) ? json_decode($value, true) : null; 
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = isset($value) ? json_encode($value) : null;
    }
}