<?php

namespace App\Providers;

use App\Model\Coupon;
use App\Model\Logo;
use App\Model\WebsiteSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $logo = Logo::find(1);
        $website_setting = WebsiteSetting::find(1);
        $coupons = Coupon::where('status', 1)->latest()->get();
        View::share([ 'logo' => $logo, 'website_setting' => $website_setting, 'coupons' => $coupons ]);
    }
}
