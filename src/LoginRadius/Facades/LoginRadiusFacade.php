<?php
namespace LoginRadius\Facades;

use Illuminate\Support\Facades\Facade;

class LoginRadiusFacade extends Facade{
    protected static function getFacadeAccessor(){
        return 'loginradius';
    }
}