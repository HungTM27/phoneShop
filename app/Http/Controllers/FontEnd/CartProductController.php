<?php

namespace App\Http\Controllers\FontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartProductController extends Controller
{
    public function CartProductPage()
    {
        return view('Components.Pages.CartProductPage');
    }
}
