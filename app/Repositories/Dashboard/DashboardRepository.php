<?php 
namespace App\Repositories\Dashboard;
use Illuminate\Support\Facades\DB;

class DashboardRepository implements DashboardInterface{
    public function getAll(){
		return  DB::table('users')->count();
	}
}
?>