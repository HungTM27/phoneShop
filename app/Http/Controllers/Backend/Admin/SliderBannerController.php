<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Banner\BannerRepository;
class SliderBannerController extends Controller
{
    private $bannerRepository;
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    public function index()
    {
        $banners = $this->bannerRepository->getAll();
        return view('Admin.Banner.listSliders',compact('banners'));
    }

    public function showCreate()
    {
       return view('Admin.Banner.createBanner');
    }

    public function createBanner(Request $request)
    {
        $this->bannerRepository->createBanner($request);
        return redirect()->route('listBanner')
        ->with('success','Thêm banner thành công');
    }
}
