<?php

namespace App\Http\Controllers\FontEnd;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FontEndController extends Controller
{
    public function index()
    {
        $banners = DB::table('sliders')->where('status', 1)->get();
        $products = DB::table('products')->orderBy('created_at', 'desc')->paginate(8);
        $categories = DB::table('categories')->where('status', 1)->get();
        return view('Components.fontEnd.templates.index', compact('banners','products','categories'));
    }

    public function productList()
    {
        $products = DB::table('products')->orderBy('created_at', 'desc')->paginate(12);
        return view('Components.fontEnd.Products.shopPage',compact('products'));
    }
}