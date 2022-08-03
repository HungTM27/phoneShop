<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Admin\User\UserRepository;

class loginController extends Controller
{
    private $usersRepository;

    public function __construct(UserRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function getLogin()
    {
        return view('Admin.Auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'username' => 'required|email',
                'password' => 'required|min:8'
            ],
            [
                'username.required' => 'vui lòng nhập địa chỉ Email ',
                'username.email' => 'Địa chỉ Email không đúng định dạng ',
                'password.required' => 'vui lòng nhập Mật khẩu ',
                'password.min' => 'Mật khẩu ít nhất là 8 ký tự',
            ],
        );
        $username = $request->input('username');
        $password = $request->input('password');
        $request->has('remember');
        if (Auth::attempt(['email' => $username, 'password' => $password], $request->remember)) {
            $users =  User::where('email', $username)->first();
            Auth::login($users);
            return redirect()->route('homePage')
                ->with('success', 'Đăng nhập thành công');
        }else{
               return redirect('/login')
            ->with('erorr', 'Tên tài khoản MK không chính xác');
        }
    }
    public function store()
    {
        return view('Admin.Auth.register');
    }
    public function create(Request $request)
    {

        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email',
                'username' => 'required',
                'password' => 'required|min:8'
            ],
            [
                'username.required' => 'vui lòng nhập địa chỉ Email ',
                'email.email' => 'Địa chỉ Email không đúng định dạng ',
                'password.required' => 'vui lòng nhập Mật khẩu ',
                'password.min' => 'Mật khẩu ít nhất là 8 ký tự',
            ]
        );

        $register = new User();
        $register->username = $request->input('username');
        $register->email = $request->input('email');
        $register->role = 2;
        $register->password = bcrypt($request->password);
        $register->save();
        Session::flash('success', 'Đăng ký tài khoản thành công');
        return redirect(route('register'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('test');
    }
}
