<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use Hash;
use Illuminate\Support\Facades\Auth;

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
}
