<?php

namespace App\Repositories\Auth;

use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function Register($request)
    {
        return $this->model->create($request);
    }
}
