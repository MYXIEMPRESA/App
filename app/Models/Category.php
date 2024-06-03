<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [ 'name', 'status' ];

    public function categoryAmenityMapping()
    {
        return $this->hasMany(CategoryAmenityMapping::class, 'category_id', 'id');
    }
    public function amenity()
    {
        return $this->hasMany(Amenity::class, 'category_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($row) {
        
        });
    }
}