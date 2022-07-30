<?php

namespace App\Repositories\Products;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductInterface
{

	public function getAll()
	{
		return  Product::orderBy('created_at', 'desc')
			->paginate(5);
	}

	public function destroyProduct($id)
	{
		return  DB::table('products')->where('id', $id)->delete($id);
	}


	public function createProduct(Request $request)
	{
		$products = new Product();
		$products = new Product();
		$products->name = $request->input('name');
		$products->price = $request->input('price');
		$products->sale_price = $request->input('sale_price');
		$products->details = $request->input('details');
		$products->status = $request->input('status');
		$products->quantity = $request->input('quantity');
		$products->cate_id = $request->input('cate_id');
		if ($request->hasFile('feature_image')) {
			$newFileName = uniqid() . '-' . $request->feature_image->extension();
			$path = $request->feature_image->storeAs('uploads/products', $newFileName);
			$products->feature_image = $path;
		}
		$products->save();
	}

	public function EditProduct($id)
	{
		return  DB::table('products')->where('id', $id)->first();
	}

	public function createEditProduct($id,Request $request)
	{
		$products = Product::find($id);
		$products->name = $request->input('name');
		$products->price = $request->input('price');
		$products->sale_price = $request->input('sale_price');
		$products->details = $request->input('details');
		$products->status = $request->input('status');
		$products->quantity = $request->input('quantity');
		$products->cate_id = $request->input('cate_id');
		if ($request->hasFile('feature_image')) {
			$newFileName = uniqid() . '-' . $request->feature_image->extension();
			$path = $request->feature_image->storeAs('uploads/products', $newFileName);
			$products->feature_image = $path;
		}
		$products->save();
	}
	
}
