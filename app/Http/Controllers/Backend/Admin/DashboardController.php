<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\Dashboard\DashboardRepository;

class DashboardController extends Controller
{

    private $dashboardRepository;
    public function __construct(DashboardRepository $dashboardRepository){
        $this->dashboardRepository = $dashboardRepository;
    }
    public function index()
    {
        return View('Admin.Dashboard.index');
    }
}
