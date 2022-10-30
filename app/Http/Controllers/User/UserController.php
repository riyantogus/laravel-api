<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserServiceInterface $service)
    {
        $this->service = $service;
    }

    public function FindAll()
    {
        return $this->service->FindAll();
    }

    public function GetUser($id)
    {
        return $this->service->GetUser($id);
    }

    public function UpdateUser($id, Request $request)
    {
        return $this->service->UpdateUser($id, $request);
    }

    public function DeleteUser($id)
    {
        return $this->service->DeleteUser($id);
    }
}
