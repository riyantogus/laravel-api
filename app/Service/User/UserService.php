<?php

namespace App\Service\User;

use App\Http\Resources\UserResource;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class UserService implements UserServiceInterface
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function FindAll()
    {
        $users = $this->repository->FindAll();

        return $users ?
            response()->json(['message' => 'Success', 'data' => UserResource::collection($users)], 200) :
            response()->json(['message' => 'User does not exist.'], 404);
    }

    public function GetUser($id)
    {
        $user = $this->repository->GetUser($id);

        return $user ?
            response()->json(['message' => 'Success', 'data' => new UserResource($user)], 200) :
            response()->json(['message' => 'User does not exist.'], 404);
    }

    public function UpdateUser($id, $request)
    {
        $validator = Validator::make($request->all(), [
            'email'                 => 'required|email',
            'name'                  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'   => $validator->errors()->first()
            ]);
        }

        return $this->repository->UpdateUser($id, $request) ?
            response()->json(['message' => 'Your account has been updated.'], 201) :
            response()->json(['message' => 'Something went wrong. Please try again.'], 400);
    }

    public function DeleteUser($id)
    {
        return $this->repository->DeleteUser($id) ?
            response()->json(['message' => 'Your account has been deleted.'], 200) :
            response()->json(['message' => 'Something went wrong. Please try again.'], 400);
    }
}
