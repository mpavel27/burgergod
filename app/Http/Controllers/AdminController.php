<?php

namespace App\Http\Controllers;

use App\Http\Requests\createExtraRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\createCategoryRequest;
use App\Http\Requests\createItemRequest;
use App\Http\Requests\editItemRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Items;
use App\Models\Extras;
use Hash;

class AdminController extends Controller
{
    public function viewLogin() {
//        return Hash::make('UjnIkm321#');
        return view('admin.login');
    }

    public function login(LoginRequest $request) {
        if ($request->validated()) {
            $credentials = $request->only('email', 'password');
            $credentials['type'] = 2;
            if (Auth::guard('admin')->attempt($credentials)) {
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
        return redirect()->back();
    }

    public function createItem(createItemRequest $request) {
        if($request->validated()) {
            $imageName = time() . '.' . $request->image->extension();
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
        return redirect()->back();
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
        $categories = Categories::get();
        if(count($item) > 0) {
            return view('admin.editItem', compact(['item', 'categories']));
        } else {
            abort(404);
        }
    }

    public function editItemValidation($itemId, editItemRequest $request) {
        if($request->validated()) {
            if (!$request->has('image')) {
                $item = Items::where('id', $itemId)->update([
                    'name' => $request->name,
                    'category' => $request->category,
                    'description' => $request->description,
                    'price' => $request->price
                ]);
                if ($item) {
                    toastr()->success("Ai editat cu succes produsul");
                    return redirect()->route('app.admin.items');
                }
            } else {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('items'), $imageName);
                $item = Items::where('id', $itemId)->update([
                    'name' => $request->name,
                    'category' => $request->category,
                    'description' => $request->description,
                    'price' => $request->price,
                    'image' => $imageName
                ]);
                if ($item) {
                    toastr()->success("Ai editat cu succes produsul");
                    return redirect()->route('app.admin.items');
                }
            }
        }
        return redirect()->back();
    }

    public function deleteCategory($categoryId) {
        $category = Categories::where('id', $categoryId)->delete();
        if($category) {
            toastr()->success("Ai sters cu succes categoria");
            return redirect()->route('app.admin.categories');
        }
    }

    public function editCategory($categoryId) {
        $category = Categories::where('id', $categoryId)->get();
        if(count($category) > 0) {
            return view('admin.editCategory', compact('category'));
        } else {
            abort(404);
        }
    }

    public function editCategoryValidation($categoryId, createCategoryRequest $request) {
        if($request->validated()) {
            $category = Categories::where('id', $categoryId)->update([
                'name' => $request->name,
            ]);
            if($category) {
                toastr()->success("Ai editat cu succes categoria");
                return redirect()->route('app.admin.categories');
            }
        }
        return redirect()->back();
    }

    public function viewExtras() {
        $products = Items::get();
        $extras = Extras::get();
        return view('admin.extras', compact(['extras', 'products']));
    }

    public function createExtra(createExtraRequest $request) {
        if($request->validated()) {
            $create = Extras::insert([
                'name' => $request->name,
                'product' => $request->product,
                'type' => $request->value,
                'price' => $request->price
            ]);
            if($create) {
                toastr()->success("Ai creat cu succes un extra");
                return redirect()->route('app.admin.extras');
            }
        }
        return redirect()->back();
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
