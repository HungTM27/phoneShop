<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
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
        // $this->validate($request,[
        //     'name' => 'required|unique:products',
        //     'price' => 'required',
        //     'sale_price' => 'required',
        //     'details' => 'required',
        //     'feature_image' => 'required',
        //     'cate_id' => 'required',
        //     'status' => 'required',
        // ]);
        //  picture upload file image 
        $data = $request->all();
        if($request->hasFile('feature_image')) {
            $newFileName = uniqid(). '-' . $request->feature_image->getClientOriginalName();
            $path = $request->feature_image->storeAs('public/uploads/products', $newFileName);
            $request->feature_image = str_replace('public/', '', $path);
            $data['feature_image'] = "$newFileName";
        }
         $this->productRepository->createProduct($data);
        return redirect()->route('listProducts')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    public function showEditProducts($id)
    {
        $cates = $this->categoriesRepository->getAllCategories();
        $products = $this->productRepository->EditProduct($id);
       return view('Admin.Products.EditProduct',compact('cates','products'));
    }

    public function createEditProducts($id ,Request $request)
    {
        $data = $request->all();
        // picture upload edit products
        if($request->hasFile('feature_image')) {
            $newFileName = uniqid(). '-' . $request->feature_image->getClientOriginalName();
            $path = $request->feature_image->storeAs('uploads/products', $newFileName);
            $request->feature_image = str_replace('public/', '', $path);
            $data['feature_image'] = "$newFileName";
        }
       $this->productRepository->createEditProduct($id,$data);
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
