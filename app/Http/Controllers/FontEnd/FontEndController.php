<?php

namespace App\Http\Controllers\FontEnd;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FontEndController extends Controller
{
    public function index()
    {
        $banners = DB::table('sliders')->where('status', 1)->get();
        $categories = DB::table('categories')->where('status', 1)->get();
        $products = DB::table('products')->orderBy('created_at', 'desc')->paginate(12);
        return view('Components.fontEnd.templates.index', compact('banners','categories','products'));
    }

    public function categoriesList($slug)
    {
        $products = DB::table('products')->where('cate_id',$slug)->orderBy('created_at', 'asc')->paginate(12);
        return view('Components.fontEnd.templates.shopPage',compact('products'));
    }
}