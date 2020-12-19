<?php

namespace App\Http\Controllers;


use App\Facade\Example;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller
{
    function home()
    {

        return auth()->user();
    }
}
