<?php
namespace App\Repositories\User;

interface UserInterface{
    public function getAll();
    public function createUser(array $data);
}