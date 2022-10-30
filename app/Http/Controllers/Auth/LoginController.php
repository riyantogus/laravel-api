<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Service\Auth\AuthServiceInterface;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $service;

    public function __construct(AuthServiceInterface $service)
    {
        $this->service = $service;
    }

    public function Login(Request $request)
    {
        return $this->service->Login($request);
    }
}
