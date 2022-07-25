<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Repositories\Dashboard\DashboardRepository;

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
