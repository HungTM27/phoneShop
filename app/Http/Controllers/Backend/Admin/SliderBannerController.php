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
        $this->validate($request,[
            [
                'title' => 'required|unique:slides',
                'slides_image' => 'required'
            ],
            [
                'title.required' => 'Vui lòng nhập chi tiết',
                'title.unique' => 'Tên đã tồn tại',
                'slides_image.required' => 'Vui lòng chọn ảnh',
            ]
        ]);
       $createBanner = $this->bannerRepository->createBanner($request);
        if (!$createBanner == '') {
            return "Thêm banner thất bại";
        }
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
        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->status = $request->status;
        if ($request->hasFile('slides_image')) {
            $newFileName = uniqid() . '-' . $request->slides_image->extension();
            $path = $request->slides_image->storeAs('uploads/banner', $newFileName);
            $banner->slides_image = $path;
        }
        $banner->save();
        if(is_null($banner == '')){
            return "Cập nhật không thành công";
        }
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
