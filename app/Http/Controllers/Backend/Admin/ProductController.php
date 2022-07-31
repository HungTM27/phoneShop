<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Categories\CategoriesRepository;

class ProductController extends Controller
{
    private $productRepository;
    private $categoriesRepository;

    public function __construct(ProductRepository $productRepository, CategoriesRepository $categoriesRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoriesRepository = $categoriesRepository;
    }
    public function index(Request $request)
    {
        $keywords = $request->keyword;
        if ($request->keyword) {
            $prods = Product::where('name', 'like', "%$request->keyword%")
                ->paginate(5);
            $prods->withPath('?keyword=' . $request->keyword);
        } else {
            $prods = $this->productRepository->getAll();
        }
        $cates = $this->categoriesRepository->getAllCategories();
        return view('Admin.Products.index', compact('prods', 'cates'));
    }

    public function store()
    {
        $cates = $this->categoriesRepository->getAllCategories();
        return view('Admin.Products.CreateProduct', compact('cates'));
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:products',
            'price' => 'required',
            'sale_price' => 'required',
            'details' => 'required',
            'feature_image' => 'required',
            'cate_id' => 'required',
            'status' => 'required',
        ],
            [
                'name.required' => 'Mời bạn nhập tên sản phẩm',
                'name.unique' => 'Tên sản phẩm đã tồn tại',
                'price.required' => 'Mời bạn nhập giá sản phẩm',
                'sale_price.required' => 'Mời bạn nhập giá khuyễn mãi sản',
                'details.required' => 'Mời bạn nhập chi tiết sản phẩm',
                'feature_image.required' => 'Mời bạn chọn ảnh sản phẩm',
                'cate_id.required' => 'Mời bạn nhập chọn danh mục sản phẩm',
            ],
        );
        $this->productRepository->createProduct($request);
        return redirect()->route('listProducts')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    public function showEditProducts($id)
    {
        $cates = $this->categoriesRepository->getAllCategories();
        $products = $this->productRepository->EditProduct($id);
       return view('Admin.Products.EditProduct',compact('cates','products'));
    }

    public function createEditProducts($id , Request $request)
    {
        $this->productRepository->createEditProduct($id, $request);
       return redirect()->route('listProducts')
            ->with('success', 'Sửa sản phẩm thành công');
    }

    public function destroy($id)
    {
        $data = $this->productRepository->destroyProduct($id);
        if (!$data != null) {
            return "404 Not Found";
        }
        return redirect()->route('listProducts')
            ->with('success', 'Xoá sản phẩm thành công');
    }
}
