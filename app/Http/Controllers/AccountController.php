<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;

class AccountController extends Controller
{
    public function viewAccount() {
        $details = User::where('id', Auth::id())->firstOrFail();
        $sessionOrders = OrderController::getSessionOrders();
        $accountOrders = Orders::where('user_id', Auth::user()->id)->get();
        return view('pages.account.index', compact(['details', 'sessionOrders', 'accountOrders']));
    }
}
