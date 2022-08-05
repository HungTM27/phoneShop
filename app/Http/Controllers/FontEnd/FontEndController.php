<?php

namespace App\Http\Controllers\FontEnd;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FontEndController extends Controller
{
    public function homePage()
    {
       return view('Components.Pages.homePage');
    }

   

    
}