<?php

namespace App\Http\Controllers\FontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductPageController extends Controller
{
    public function productsPage()
    {
        return view('Components.Pages.ProductShop');
    }
}
