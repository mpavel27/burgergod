<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\User;
use App\Models\Categories;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function viewHomepage() {
        $categories = Categories::with('items')->get();
        $items = Items::orderBy('id', 'DESC')->get();
        return view('homepage', compact(['items', 'categories']));
    }

    public function viewItem($id) {
        $item = Items::where('id', $id)->with('extras')->firstOrFail();
        return view('pages.item', compact('item'));
    }

    public function login(LoginRequest $request) {
        if($request->validated()) {
            $credentials = $request->only('email', 'password');
            $credentials['type'] = 0;
            if (Auth::attempt($credentials)) {
                toastr()->success('Te-ai autentificat cu success');
            } else {
                toastr()->error('Ceva nu a mers bine, va rugam sa incercat din nou');
            }
        }
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('app.home');
    }

    private function existsUser(string $email)
    {
        try {
            $user = User::where('email', $email)->select('id', 'email')->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return false;
        }

        if ($user) {
            return true;
        }
        return false;
    }

    public function register(RegisterRequest $request) {
        if($request->validated()) {
            if ($this->existsUser($request->email)) {
                toastr()->error('E-mail-ul pe care l-ați introdus este deja folosit.');
                return redirect()->back();
            }
            $create = User::create($request->except(['_token', 'password_confirmation']));
            if ($create) {
                Auth::login($create);
                toastr()->success('Te-ai înregistrat cu succes!');
            }
        }
        return redirect()->back();
    }
}
