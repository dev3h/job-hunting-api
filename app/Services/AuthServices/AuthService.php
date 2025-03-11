<?php

namespace App\Services\AuthServices;

use App\Helpers\ResponseHelper;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public static function login(array $credentials, $request)
    {
        $tableMap = collect([
            'employee.api.*' => ['model' => Employee::class, 'guard' => 'employee'],
            'api.*' => ['model' => User::class, 'guard' => 'web'],
            'admin.api.*' => ['model' => Admin::class, 'guard' => 'admin']
        ])->first(fn($value, $key) => $request->routeIs($key));
        $user = $tableMap['model']::where('email', $credentials['email'])->first();
        if (!Hash::check($credentials['password'], $user->password)) {
            throw validationException::withMessages(['password' => 'Password is incorrect']);
        }
        $token = auth($tableMap['guard'])->attempt($credentials);
        return (new self())->respondWithToken($token, $tableMap['guard']);
    }

    public static function refresh($request)
    {
        try {
            $guardMap = collect([
                'employee.api.*' => 'employee',
                'api.*' => 'web',
                'admin.api.*' => 'admin'
            ])->first(fn($value, $key) => $request->routeIs($key));
            return (new self())->respondWithToken(auth($guardMap)->refresh(), $guardMap);
        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage(), $e->getTrace());
        }
    }

    public static function me($request)
    {
        try {
            $guardMap = collect([
                'employee.api.*' => 'employee',
                'api.*' => 'web',
                'admin.api.*' => 'admin'
            ])->first(fn($value, $key) => $request->routeIs($key));
            return ResponseHelper::success(auth($guardMap)->user());
        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage(), $e, $e->getCode());
        }
    }

    protected function respondWithToken($token, $guard = 'web')
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($guard)->factory()->getTTL() * 1
        ];
        return ResponseHelper::success($data, 'Login success');
    }
}