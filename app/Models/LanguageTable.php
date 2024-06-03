<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class LanguageTable extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [ 'language_id', 'language_name','language_code', 'country_code', 'language_flag', 'is_rtl', 'status', 'is_default' ];


    protected $casts = [
        'language_id' => 'integer',
        'is_rtl'      => 'integer',
    ];

    public function languageContent()
    {
        return $this->hasMany(LanguageContent::class,'language_id','id');
    }

    public function LanguageDefaultList()
    {
        return $this->belongsTo(LanguageDefaultList::class, 'language_id','id');
    }

    
}
