<?php

namespace App\Service\User;

interface UserServiceInterface
{
    public function FindAll();
    public function GetUser($id);
    public function UpdateUser($id, $request);
    public function DeleteUser($id);
}
