<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extras extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    protected $table = 'food_extras';

    public $timestamps = true;
}
