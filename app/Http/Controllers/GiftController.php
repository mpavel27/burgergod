<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OrderController;
use App\Models\Items;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function viewGift() {
        $sessionOrders = OrderController::getSessionOrders();
        return view('pages.gift', compact('sessionOrders'));
    }

    public function requestGift(Request $req)
    {
        // gets a random product
        $products = Items::get();
        $count = count($products);
        $selected = rand(0, $count-1);
        $item = $products[$selected];

        // inserts the product inside the cart


        // sends the product as json
        return response()->json([
            "product_name" => $item->name,
            "product_image" => $item->image,
        ]);
    }
}
