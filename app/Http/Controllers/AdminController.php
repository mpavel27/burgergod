<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\createCategoryRequest;
use App\Http\Requests\createItemRequest;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Items;

class AdminController extends Controller
{
    public function viewLogin() {
//        return Hash::make('UjnIkm321#');
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
        $categories = Categories::get();
        return view('admin.items', compact(['items', 'categories']));
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

    public function createItem(createItemRequest $request) {
        if($request->validated()) {
            $imageName = time() . '_' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('items'), $imageName);
            $create = Items::insert([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $imageName
            ]);
            if($create) {
                toastr()->success('Ai creat cu succes un nou produs');
                return redirect()->back();
            }
        }
    }

    public function deleteItem($itemId) {
        $itemName = Items::where('id', $itemId)->get();
        $item = Items::where('id', $itemId)->delete();
        if($item) {
            toastr()->success("Ai sters cu succes produsul {$itemName->name}");
            return redirect()->back();
        }
    }

    public function editItem($itemId) {
        $item = Items::where('id', $itemId)->get();
        if(count($item) > 0) {
            return view('admin.editItem', compact('item'));
        } else {
            abort(404);
        }
    }
}
