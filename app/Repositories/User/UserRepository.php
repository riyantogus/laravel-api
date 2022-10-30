<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function FindAll()
    {
        return $this->model->all();
    }

    public function GetUser($id)
    {
        return $this->model->find($id);
    }

    public function UpdateUser($id, $request)
    {
        return $this->model->where('id', $id)->update([
            'email' => $request->email,
            'name'  => $request->name
        ]);
    }

    public function DeleteUser($id)
    {
        return $this->model->find($id)->delete();
    }
}
