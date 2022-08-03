<?php
namespace App\Repositories\Admin\Products;

use Illuminate\Http\Request;

interface ProductInterface{
    public function getAll();
    public function destroyProduct($id);
    public function createProduct(Request $request);
    public function EditProduct($id);
    public function createEditProduct($id,Request $request);
}