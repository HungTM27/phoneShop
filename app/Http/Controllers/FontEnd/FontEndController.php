<?php

namespace App\Http\Controllers\FontEnd;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FontEndController extends Controller
{
    public function homePage()
    {
        $products = DB::table('products')->where('sale_price','<', 'price')
        ->limit(3)->get();
        $productNew = DB::table('products')->orderBy('created_at', 'desc')->limit(3)->get();
        $productHome = DB::table('products')->where('status', 1)->orderBy('created_at', 'desc')->limit(8)->get();
       return view('Components.Pages.homePage',compact('productHome','products','productNew'));
    }

    function categoriesListMenu(){
        $categoriesMenu = DB::table('categories')->where('status',1)->get();
        return view('Components.Pages.layouts',compact('categoriesMenu'));
    }
}