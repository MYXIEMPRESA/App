<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageKeyword extends Model
{
    use HasFactory;

    protected $fillable = ['screen_id', 'keyword_id','keyword_name','keyword_value'];

    protected $casts = [
        'screen_id' => 'integer',
    ];

    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id','screenId');
    }

}
