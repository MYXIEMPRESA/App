<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavouriteProperty extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'property_id' ];
    
    protected $casts = [
        'user_id'      => 'integer',
        'property_id'  => 'integer',
    ];

}
