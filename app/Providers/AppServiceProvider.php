<?php

namespace App\Providers;

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
		 //Helpers
		 $this->app->singleton(\App\Helpers\ClientConnected::class, function(){
			  return new \App\Helpers\ClientConnected();
		 });

    }
}
