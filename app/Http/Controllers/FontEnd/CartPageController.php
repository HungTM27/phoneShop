<?php

namespace App\Http\Controllers\FontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartPageController extends Controller
{
        public function checkoutCartPage()
        {
            return view('Components.Pages.CheckOutCart');
        }
}
