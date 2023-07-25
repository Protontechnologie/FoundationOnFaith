<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\attributes;
use Illuminate\Support\Str;
use Session;

class CartController extends Controller
{
    public function cart()
    {
        $title = "Cart | ".env('APP_NAME');
        $description = "";
        return view('web.cart')->with(compact('title' , 'description'));
    }

    public function checkout()
    {
        $title = "Checkout | ".env('APP_NAME');
        $description = "";
        return view('web.checkout')->with(compact('title' , 'description'));
    }


}
