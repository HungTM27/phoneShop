<?php 
namespace App\Repositories\Admin\Categories;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoriesRepository implements CategoriesInterface
{
	public function getAll(){
			return  DB::table('categories')
		    ->orderBy('created_at', 'desc')
		    ->paginate(5);
		
	}
	public function getAllCategories()
	{
		return DB::table('categories')->get();
	}

	public function createCategories(array $data)
	{
		return DB::table('categories')->insert([
			'name' => $data['name'],
			'slug' => $data['slug'],
			'status' => $data['status'],
		]);
	}

	public function editCategories($id)
	{
		return DB::table('categories')->find($id);
	}

	public function updateCategories($id, array $data)
	{
		return DB::table('categories')
		->where('id', $id)
     	->update([
        'name' => $data['name'],
		   'slug' => $data['slug'],
		   'status' => $data['status'],
        ]);
	}


	public function destroy($id)
	{
		return  DB::table('categories')->where('id', $id)->delete($id);
	}
}
