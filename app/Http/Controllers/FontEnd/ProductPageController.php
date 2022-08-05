<?php

namespace App\Http\Controllers\FontEnd;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class ProductPageController extends Controller
{
    public function productsPage()
    {
        $productAll = DB::table('products')->orderBy('created_at', 'desc')->paginate(12);
        return view('Components.Pages.ProductShop',compact('productAll'));
    }
}
