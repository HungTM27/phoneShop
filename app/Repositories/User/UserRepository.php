<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
	public function getAll()
	{
		return  DB::table('users')
			->orderBy('created_at', 'desc')
			->paginate(5);;
	}

	public function createUser(array $data)
	{
		return  DB::table('users')->insert(
			[
				'username' => $data['username'],
				'email' => $data['email'],
				'password' => bcrypt($data['password']),
				'password_confirmation' => bcrypt($data['password_confirmation']),
				'phone' => $data['phone'],
				'address' => $data['address'],
				'role' => $data['role'],
				'avatar' => $data['avatar'],
			]
		);
	}

	public function EditUser($id)
	{
		return DB::table('users')->find($id);
	}

	public function createEditUser(array $data, $id)
	{
		return DB::table('users')->where('id', $id)->update([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'password_confirmation' => bcrypt($data['password_confirmation']),
			'phone' => $data['phone'],
			'address' => $data['address'],
			'role' => $data['role'],
			'avatar' => $data['avatar'],
		]);
	}

	public function destroyUser($id)
	{
		return  DB::table('users')->where('id', $id)->delete($id);
	}
}
