<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class StatusProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('statusActive', function () {
//            $now = Carbon::now();
//
//            $start = Carbon::createFromTimeString('08:00');
//            $end = Carbon::createFromTimeString('23:00')->addDay();
//            if($now->between($start, $end)) {
//                return false;
//            }
            if($now->between($start, $end)) {
                return false;
            }
            return true;
        });
    }
}
