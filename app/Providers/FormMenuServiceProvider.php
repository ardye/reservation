<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Kategori;

class FormMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('menu/form', function($view) {
            $view->with('listKategori', Kategori::pluck('namaKategori', 'idKategori'));
        });
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
