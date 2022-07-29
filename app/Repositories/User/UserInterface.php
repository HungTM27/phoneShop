<?php
namespace App\Repositories\User;

interface UserInterface{
    public function getAll();
    public function createUser(array $data);
    public function EditUser($id);
    public function createEditUser(array $data , $id);
    public function destroyUser($id);
}