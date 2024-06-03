<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageDefaultList extends Model
{
    use HasFactory;

    protected $fillable = [ 'languageName', 'languageCode', 'countryCode'];

    public function languageTable()
    {
        return $this->hasMany(LanguageTable::class, 'language_id','id');
    }
    
}
