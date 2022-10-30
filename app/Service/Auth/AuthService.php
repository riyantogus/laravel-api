<?php

namespace App\Service\Auth;

use App\Http\Resources\RegisterResource;
use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthService implements AuthServiceInterface
{
    protected $repository;

    public function __construct(AuthRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function Register($request)
    {
        $validator = Validator::make($request->all(), [
            'email'                 => 'required|unique:users|email',
            'name'                  => 'required',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'   => $validator->errors()->first()
            ]);
        }

        $user = $this->repository->Register([
            'email'     => $request->email,
            'name'      => $request->name,
            'password'  => bcrypt($request->password)
        ]);

        if (!$user) {
            return response()->json([
                'message'   => 'Something went wrong. Please try again.',
            ], 401);
        }

        $resp = new RegisterResource($user);

        return response()->json([
            'message'   => 'Thanks for signing up. Your account has been created.',
            'data'      => $resp
        ], 201);
    }

    public function Login($request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'   => $validator->errors()->first()
            ]);
        }

        return Auth::attempt(['email' => $request->email, 'password' => $request->password]) ?
            response()->json(['message' => 'You are successfully logged in.'], 200) :
            response()->json(['message' => 'Invalid username or password'], 401);
    }
}
