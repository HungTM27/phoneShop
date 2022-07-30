<?php
namespace App\Repositories\Categories;
use Illuminate\Http\Request;
interface CategoriesInterface{
    public function getAll();
    public function getAllCategories();
    public function createCategories(array $data);
    public function editCategories($id);
    public function updateCategories($id, array $data);
    public function destroy($id);
}