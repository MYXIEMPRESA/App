<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    
    protected $fillable = [ 'name', 'tags_id', 'description', 'status' ];

    public function getTagsIdAttribute($value)
    {
        return isset($value) ? json_decode($value, true) : null; 
    }

    public function setTagsIdAttribute($value)
    {
        $this->attributes['tags_id'] = isset($value) ? json_encode($value) : null;
    }
}
