<?php
namespace App\Repositories\User;
use Illuminate\Http\Request;
interface UserInterface{
    public function getAll();
    public function createUser(Request $request);
    public function EditUser($id);
    public function createEditUser(Request $request, $id);
    public function destroyUser($id);
}