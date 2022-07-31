<?php 
namespace App\Repositories\Banner;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BannerRepository implements BannerInterface{
    public function getAll()
		{
			return  DB::table('sliders')->get();
		}

		public function createBanner(Request $request)
		{
			$banner = new Banner();
			$banner->title = $request->title;
			$banner->status = $request->status;
			if ($request->hasFile('slides_image')) {
				$newFileName = uniqid() . '-' . $request->slides_image->extension();
				$path = $request->slides_image->storeAs('uploads/banner', $newFileName);
				$banner->slides_image = $path;
			}
			$banner->save();
		}

		public function editBanner($id)
		{
			return DB::table('sliders')->where('id', $id)->first();
		}

		public function createEditBanner($id, Request $request)
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
		}

		public function destroyBanner($id)
		{
			return  DB::table('sliders')->where('id', $id)->delete($id);
		}
}
?>	