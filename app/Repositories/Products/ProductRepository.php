<?php 
namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
class ProductRepository implements ProductInterface{

    public function getAll(){
		 return  Product::orderBy('id','asc')
		 ->paginate(5);
	}

	public function destroyProduct($id)
	{
		return  DB::table('products')->where('id', $id)->delete($id);
	}


	public function createProduct(array $data)
	{
		$products = new Product();
		$products->name = $data['name'];
		$products->price = $data['price'];
		$products->sale_price = $data['sale_price'];
		$products->details = $data['details'];
		$products->status = $data['status'];
		$products->cate_id = $data['cate_id'];
		$products->feature_image = $data['feature_image'];
		// dd($products);
		$products->save();
	}

	public function EditProduct($id)
	{
		return  DB::table('products')->where('id', $id)->first();
	}

	public function createEditProduct($id, array $data)
	{
		return	DB::table('products')->where('id', $id)->update([
			'name' => $data['name'],
            'price' => $data['price'],
            'sale_price' => $data['sale_price'],
            'details' => $data['details'],
			'status' => $data['status'],
			'cate_id' => $data['cate_id'],
			'feature_image' => $data['feature_image'],
		]);
	}

}
