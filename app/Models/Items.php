<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $table = 'food_menu';

    public function getCategoryNameAttribute() {
        $category = Categories::where('id', $this->category)->first();
        if($category) {
            return $category->name;
        } else {
            return 'Aceasta categorie nu are un nume setat.';
        }
    }
}
