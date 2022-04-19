<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function viewGift() {
        $sessionOrders = OrderController::getSessionOrders();
        return view('pages.gift', compact('sessionOrders'));
    }
}
