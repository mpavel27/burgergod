<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Store;

class isShopOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $store_status = Store::where('name', 'store_online')->first()->value;
        if($store_status == 'true') {
            return $next($request);
        } else {
            toastr()->warning("Ne pare rau dar momentan suntem indisponibili");
            return redirect()->route('app.offline.shop');
        }
    }
}
