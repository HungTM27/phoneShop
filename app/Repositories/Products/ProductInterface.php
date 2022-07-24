<?php
namespace App\Repositories\Products;

interface ProductInterface{
    public function getAll();
    public function destroyProduct($id);
    public function createProduct(array $data);
    public function EditProduct($id);
    public function createEditProduct($id, array $data);
}