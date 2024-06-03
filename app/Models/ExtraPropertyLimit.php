<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraPropertyLimit extends Model
{
    use HasFactory;

    protected $fillable = [ 'limit', 'price', 'type' ];

    protected $casts = [
        'limit'  => 'integer',
        'price'  => 'double',
    ];

}
