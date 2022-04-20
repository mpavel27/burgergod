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

    public function updateAccount(Request $request) {
        $user = User::where('id', Auth::user()->id)->update(
            [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'city' => $request->city
            ]
        );
        if($user) {
            toastr()->success("Ti-ai actualizat cu succes detaliile");
            return redirect()->route('app.account');
        }
    }
}
