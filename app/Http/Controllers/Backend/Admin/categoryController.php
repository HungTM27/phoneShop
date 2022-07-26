<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\Categories\CategoriesRepository;

class categoryController extends Controller
{
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function getCates(Request $request)
    {
        $keywords = $request->keyword;
        if ($request->keyword) {
            $cates = Category::where('name', 'like', "%$request->keyword%")
                ->paginate(5);
            $cates->withPath('?keyword=' . $request->keyword);
        } else {
            $cates = $this->categoriesRepository->getAll();
        }
        return View('Admin.Category.index', compact('cates', 'keywords'));
    }

    public function changeStatus(Request $request)
    {
        $changeStatus = Category::find($request->id);
        $changeStatus->status = $request->status;
        $changeStatus->save();
        return response()->json(['success' => 'Kích hoạt thành công']);
    }

    public function store()
    {
        return view('Admin.Category.storeCategories');
    }

    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:categories',
            ],
            [
                'name.required' => 'vui lòng nhập sản phẩm ',
                'name.unique' => 'Tên sản phẩm đã tồn tại',
            ],
        );
        $data = $request->all();
        $this->categoriesRepository->createCategories($data);
        return redirect(route('listcates'))
            ->with('success', 'Thêm thành công danh danh mục');
    }

    public function show($id)
    {
        $cates = $this->categoriesRepository->editCategories($id);
        return view('Admin.Category.editCategories', compact('cates'));
    }

    public function update($id, Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:categories',
            ],
            [
                'name.unique' => 'Tên sản phẩm đã tồn tại',
            ],
        );

        $data = $request->all();
        $this->categoriesRepository->updateCategories($id, $data);
        return redirect(Route('listcates'));
    }

    public function destroy($id)
    {
        $data = $this->categoriesRepository->destroy($id);
        if (!$data != null) {
            return redirect()->back()
                ->with('error', 'Xóa danh mục thất bại');
        }
        return redirect()->route('listcates')
            ->with('success', 'Xoá danh mục thành công');
    }
}
