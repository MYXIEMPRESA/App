<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageContent extends Model
{
    use HasFactory;

    protected $fillable = [ 'language_id', 'keyword_id','screen_id','keyword_value'];

    protected $casts = [
        'language_id'      => 'integer',
        'keyword_id'      => 'integer',
    ];

    public function languageTable()
    {
        return $this->belongsTo(LanguageTable::class, 'language_id','id');
    }

    public function languageKeyword()
    {
        return $this->belongsTo(LanguageKeyword::class, 'keyword_id','id');
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id', 'screenId');
    }
}
