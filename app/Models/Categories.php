<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Items;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = 'food_categories';

    public $timestamps = true;

    public function items() {
        return $this->hasMany(Items::class, 'category');
    }
}
