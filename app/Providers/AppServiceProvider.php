<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         view()->composer('include.footer', function($menu){
            $address = Menu::where('key', 'address')->first();
            $phone = Menu::where('key', 'phone')->first();
            $email = Menu::where('key', 'email')->first();
            $linkedin = Menu::where('key', 'linkedin')->first();
            $wa = Menu::where('key', 'wa')->first();
            $ig = Menu::where('key', 'ig')->first();
            $yt = Menu::where('key', 'yt')->first();
            
            $menu->with([
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
                'linkedin' => $linkedin,
                'wa' => $wa,
                'ig' => $ig,
                'yt' => $yt,
            ]);
        });
    }
}
