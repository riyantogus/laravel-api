<?php

namespace App\Service\Auth;

interface AuthServiceInterface
{
    public function Register($request);
    public function Login($request);
}
