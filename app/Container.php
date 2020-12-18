<?php


namespace App;


class Container
{

    protected $bindings =[];


    function bind($key, $value) {
        $this->bindings[$key] = $value;

    }

    function  resolve($key){
        try {
            return call_user_func($this->bindings[$key]);
        }catch (\Exception $e) {
            return  $e;
        }
          }
}
