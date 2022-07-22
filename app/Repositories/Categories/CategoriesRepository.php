<?php 
namespace App\Repositories\Categories;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
class CategoriesRepository implements CategoriesInterface
{
	public function getAll(){
			return  DB::table('categories')
		    ->orderBy('created_at', 'desc')
		    ->paginate(5);
		
	}

	public function createCategories(array $data)
	{
		return Category::insert([
			'name' => $data['name'],
			'status' => $data['status'],
		]);


	}

	public function editCategories($id)
	{
		return Category::find($id);
	}

	public function updateCategories($id, array $data)
	{
		return DB::table('categories')
		->where('id', $id)
     	->update([
           'name' => $data['name'],
		   'status' => $data['status'],
        ]);
	}


	public function destroy($id)
	{
		$remove = Category::destroy($id);
        if(!$remove){
			return redirect()->back();
        }
		return $remove;
	}
}
?>