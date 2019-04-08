<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class AtozServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
		require_once app_path() . '/Helpers/Helper.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
		$halaman = '';
		if(Request::segment(1) == 'prepaid_balance') {
			$halaman = 'prepaid_balance';
		}
		if(Request::segment(1) == 'product') {
			$halaman = 'product';
		}
		if(Request::segment(1) == 'order') {
			$halaman = 'product';
		}
		view()->share('halaman', $halaman);
    }
}
