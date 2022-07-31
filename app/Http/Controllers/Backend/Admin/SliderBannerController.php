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

    public function changeStatusBanner(Request $request)
    {
        $changeStatusBanner = Banner::find($request->id);
        $changeStatusBanner->status = $request->status;
        $changeStatusBanner->save();
        return response()->json([
            'success' => 'cap nhat thanh cong'
        ]);
    }

    public function createBanner(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|unique:slides',
                'slides_image' => 'required'
            ],
            [
                'title.required' => 'Vui lòng nhập chi tiết',
                'title.unique' => 'Tên đã tồn tại',
                'slides_image.required' => 'Vui lòng chọn ảnh',
            ]
        );
       $this->bannerRepository->createBanner($request);
        return redirect()->route('listBanner')
        ->with('success','Thêm banner thành công');
    }

    public function showEdit($id)
    {
        $editBanner = $this->bannerRepository->editBanner($id);
        return view('Admin.Banner.editBanner',compact('editBanner'));
    }

    public function editCreateBanner(Request $request, $id)
    {
        $this->bannerRepository->createEditBanner($id, $request);
        return redirect()->route('listBanner')
        ->with('success','Sửa banner thành công');
    }

    public function destroyBanner($id)
    {
        $deleteBanner = $this->bannerRepository->destroyBanner($id);
        if (!$deleteBanner) {
            return "id không tồn tại";
        }
        return redirect()->route('listBanner')
        ->with('success','Xoá banner thành công');
    }


}
