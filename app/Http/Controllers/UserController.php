<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Categories;

class UserController extends Controller
{
    public function test() {
        $categories = Categories::with('items')->get();
        $items = Items::orderBy('id', 'DESC')->get();
        return view('homepage', compact(['items', 'categories']));
    }
}
