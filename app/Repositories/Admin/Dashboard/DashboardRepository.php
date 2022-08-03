<?php 
namespace App\Repositories\Admin\Dashboard;
use Illuminate\Support\Facades\DB;

class DashboardRepository implements DashboardInterface{
    public function getAll(){
		return  DB::table('users')->count();
	}
}
?>