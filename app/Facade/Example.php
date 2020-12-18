<?php


namespace App\Facade;

use Illuminate\Support\Facades\Facade;
/**
* @method static array handle()
*/
class Example extends Facade {

    protected static function getFacadeAccessor(): string
    {
        return 'example';
    }
}
