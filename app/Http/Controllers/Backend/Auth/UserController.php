<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    private $usersRepository;

    public function __construct(UserRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function index(Request $request){
            $users = $this->usersRepository->getAll();
            return view('Admin.User.index',compact('users'));
    }

    public function showUser()
    {
        return view('Admin.User.CreateUser');
    }

    public function createUser()
    {
        # code...
    }
}
