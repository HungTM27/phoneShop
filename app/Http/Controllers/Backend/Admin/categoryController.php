<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
    public function getCates(Request $request)
    {
        $cates = Category::orderBy('created_at', 'asc')
        ->where('name','like', '%'.$request->search.'%')
        ->paginate(5);
        return View('Admin.Category.index',compact('cates'));
    }

    public function changeStatus(Request $request)
    {
        $user = Category::find($request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }

    public function destroy($id){
        $remove = Category::destroy($id);
        if(!$remove){
            return redirect()->back()
            ->with('error','id khong ton tai');
        }
        return redirect()->route('listcates')
        ->with('success','xoa danh muc thanh cong');
    }
}
