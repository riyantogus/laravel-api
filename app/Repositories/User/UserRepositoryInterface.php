<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function FindAll();
    public function GetUser($id);
    public function UpdateUser($id, $request);
    public function DeleteUser($id);
}
