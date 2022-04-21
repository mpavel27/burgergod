<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use Hash;

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

    public function changePassword(Request $request) {
        $actualPassword = $request->actual_password;
        if(Hash::check($actualPassword, Auth::user()->password)) {
            $newPassword = Hash::make($request->new_password);
            $user = User::where('id', Auth::user()->id)->update([
                'password' => $newPassword
            ]);
            if($user) {
                toastr()->success("Ti-ai actualizat parola cu succes");
                return redirect()->back();
            }
        } else {
            toastr()->error("Parola actuală nu corespunde");
            return redirect()->back();
        }
    }
}
