<?php 
namespace App\Repositories\User;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserRepository implements UserInterface{
    public function getAll(){
		return  DB::table('users')
		      ->orderBy('created_at', 'desc')
		     ->paginate(5);;
	}
}
?>