<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;

class UserController extends Controller
{
    private $usersRepository;

    public function __construct(UserRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->middleware('admin.role')->except('logout');;
    }

    public function index(Request $request)
    {
        $users = $this->usersRepository->getAll();
        return view('Admin.User.index', compact('users'));
    }

    public function showCreateUser()
    {
        return view('Admin.User.CreateUser');
    }

    public function changeRole(Request $request)
    {
        $changeRole = User::find($request->id);
        $changeRole->role = $request->role;
        $changeRole->save();
        return response()->json(['success' => 'Kích hoạt thành công tài khoản',],
        );
    }

    public function showReviewUser($id)
    {
        $showReviewUser = $this->usersRepository->EditUser($id);
        return view('Admin.User.ShowReview', compact('showReviewUser'));
    }

    public function createUser(Request $request)
    {
        $this->validate(
            $request,
            [
                // 'email' => 'required|unique:users',
                // 'username' => 'required',
                // 'phone' => 'required',
                // 'address' => 'required',
                // 'avatar' => 'required',
                'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            ],
        );
        // image upload users 
        $createUser = $request->all();
        $data = new User();
        if($request->hasFile('avatar')){
            $newFileName = uniqid(). '-' . $request->avatar->getClientOriginalName();
            $path = $request->avatar->storeAs('public/uploads/products', $newFileName);
            $data->image = str_replace('public/', '', $path);
        }
        
        $this->usersRepository->createUser($createUser);
        return redirect()->route('listUser')
        ->with('success', 'Thêm tài khoản thành công');
    }

    public function EditUser($id)
    {   
        $editUser = $this->usersRepository->EditUser($id);
        return View('Admin.User.EditUser',compact('editUser'));
    }

    public function createEditUser(Request $request, $id)
    {   
        $updateUser = $request->all();
        if($request->hasFile('avatar')){
            $newFileName = uniqid(). '-' . $request->avatar->getClientOriginalName();
            $path = $request->avatar->storeAs('public/uploads/products', $newFileName);
            $request->image = str_replace('public/', '', $path);
        }
        $this->usersRepository->createEditUser($updateUser,$id);
        return redirect()->route('listUser')
        ->with('success', 'Sửa tài khoản thành công');
    }

    public function destroyUser($id)
    {
        $deleteUser = $this->usersRepository->destroyUser($id);
        if(empty($deleteUser)){
            return "404 Not Found";
        }
        return redirect()->route('listUser')
        ->with('success', 'Xoá tài khoản thành công');
    }
}
