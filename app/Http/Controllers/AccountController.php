<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function viewAccount() {
        $details = User::where('id', Auth::id())->firstOrFail();
        return view('pages.account.index', compact(['details']));
    }
}
