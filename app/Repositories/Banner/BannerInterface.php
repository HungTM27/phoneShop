<?php
namespace App\Repositories\Banner;

use Illuminate\Http\Request;

interface BannerInterface{
  public function getAll();
  public function createBanner(Request $request);
  public function createEditBanner($id, Request $request);
  public function destroyBanner($id);
}