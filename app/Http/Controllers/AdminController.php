<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\createCategoryRequest;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Items;

class AdminController extends Controller
{
    public function viewLogin() {
//        return Hash::make('parola123');
        return view('admin.login');
    }

    public function login(LoginAdminRequest $request) {
        if ($request->validated()) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                toastr()->success('Te-ai autentificat cu success');
            } else {
                toastr()->error('Ceva nu a mers bine, va rugam sa incercat mai tarziu');
            }
        }
        return redirect()->back();
    }

    public function viewAdminIndex() {
        return view('admin.dashboard');
    }

    public function viewItems() {
        $items = Items::get();
        return view('admin.items', compact('items'));
    }

    public function viewCategories() {#
        $categories = Categories::get();
        return view('admin.categories', compact('categories'));
    }

    public function createCategory(createCategoryRequest $request) {
        if($request->validated()) {
            $create = Categories::insert(['name' => $request->name]);
            if($create) {
                toastr()->success('Ai creat cu succes o noua categorie');
                return redirect()->back();
            }
        }
    }
}
