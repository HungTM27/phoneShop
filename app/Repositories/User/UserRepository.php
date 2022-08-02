<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
	public function getAll()
	{
		return  DB::table('users')
			->orderBy('created_at', 'desc')
			->paginate(5);;
	}

	public function createUser(Request $request)
	{
				$createUser = new User();
				$createUser->username = $request->input('username');
				$createUser->email = $request->input('email');
				$createUser->phone = $request->input('phone');
				$createUser->address = $request->input('address');
				$createUser->role = $request->input('role');
				$createUser->password = bcrypt($request->input('password'));
				$createUser->password_confirmation = bcrypt($request->input('password_confirmation'));
				if ($request->hasFile('avatar')) {
					$newFileName = uniqid() . '-' . $request->avatar->extension();
					$path = $request->avatar->storeAs('uploads/users', $newFileName);
					$createUser->avatar = $path;
				}
				$createUser->save();
	}

	public function EditUser($id)
	{
		return DB::table('users')->find($id);
	}

	public function createEditUser($id,Request $request)
	{
		$createUser = User::find($id);
		$createUser->username = $request->input('username');
		$createUser->email = $request->input('email');
		$createUser->phone = $request->input('phone');
		$createUser->address = $request->input('address');
		$createUser->role = $request->input('role');
		$createUser->password = bcrypt($request->input('password'));
		$createUser->password_confirmation = bcrypt($request->input('password_confirmation'));
		if ($request->hasFile('avatar')) {
				$newFileName = uniqid() . '-' . $request->avatar->extension();
				$path = $request->avatar->storeAs('uploads/users', $newFileName);
				$createUser->avatar = $path;
		}
		$createUser->save();
	}

	public function destroyUser($id)
	{
		return  DB::table('users')->where('id', $id)->delete($id);
	}
}
