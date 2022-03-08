<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class OrderController extends Controller
{
    public function viewCheckout() {
        if(Auth::check()) {
            $items = json_decode(Auth::user()->cart);
        } else {
            $items = json_decode(session('cart'));
        }
        if(count($items) != 0) {
            $total = array_sum(array_map(function ($e) { return $e->price; }, $items));
            if(session('shipment_type') == 1) {
                $delivery_tax = Store::where('name', 'delivery_tax')->firstOrNew(['name' => 'delivery_tax', 'value' => '14.99'])->value;
            } else {
                $delivery_tax = 0;
            }
            return view('pages.checkout', compact(['total', 'delivery_tax']));
        } else {
            abort(404);
        }
    }

    public function checkoutPost(OrderRequest $request) {
        if($request->validated()) {
            $sub_total = json_decode(session('cart'));
            $total = array_sum(array_map(function ($e) { return $e->price; }, $sub_total));
            if(session('shipment_type') == 1) {
                $delivery = Store::where('name', 'delivery_tax')->first()->value;
                $total += $delivery;
                return dd($total);
                // TODO: INSERT INTO DB THE NEW ORDER
                // TODO: SEND THE NOTIFICATION TO THE ADMIN PANEL
            }
            printf($total);
            // TODO: INSERT INTO DB THE NEW ORDER
            // TODO: SEND THE NOTIFICATION TO THE ADMIN PANEL
        }
    }

    public function cartPost(Request $request) {
        session(['shipment_type' => $request->shipment]);
        return redirect()->route('app.cart.checkout');
    }
}
