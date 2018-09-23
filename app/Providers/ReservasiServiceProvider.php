<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Request;

class ReservasiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = "";

        if(Request::segment(1) == 'dashboard') {
            $halaman = 'dashboard';
        }
        if(Request::segment(1) == 'kategori') {
            $halaman = 'kategori';
        }

        if(Request::segment(1) == 'menu') {
            $halaman = 'menu';
        }

        if(Request::segment(1) == 'event') {
            $halaman = 'event';
        }

        if(Request::segment(1) == 'fasilitas') {
            $halaman = 'fasilitas';
        }

        if(Request::segment(1) == 'booked') {
            $halaman = 'booked';
        }

        view()->share('halaman', $halaman);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
