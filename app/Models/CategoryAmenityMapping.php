<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAmenityMapping extends Model
{
    use HasFactory;

    protected $fillable = [ 'amenity_id', 'category_id' ];

    protected $casts = [
        'amenity_id'   => 'integer',
        'category_id'   => 'integer',
    ];

    public function amenity()
    {
        return $this->belongsTo(Amenity::class, 'amenity_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
}
