<?php
namespace App\Repositories\Admin\User;
use Illuminate\Http\Request;
interface UserInterface{
    public function getAll();
    public function createUser(Request $request);
    public function EditUser($id);
    public function createEditUser($id,Request $request);
    public function destroyUser($id);
}