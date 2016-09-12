<?php namespace Larangu\FormNg\Facades;

use Illuminate\Support\Facades\Facade;

class FormNgFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'formNgService';
    }
}