<?php

namespace LoginRadius\Support;

use Illuminate\Support\ServiceProvider;

class LoginRadiusServiceProvider extends ServiceProvider{

    public function register(){
        $this->app['loginradius'] = $this->app->share(function($app){
            return new \LoginRadius\LoginRadius;
        });

        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('LoginRadius', 'LoginRadius\Facades\LoginRadiusFacade');
        });
    }
}