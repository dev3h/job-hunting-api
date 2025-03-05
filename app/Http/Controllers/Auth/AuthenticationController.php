<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    /**
         * @OA\Post(
         *     summary="Login",
         *     tags={"Authentication"},
         *     path="/api/auth/login",
         *     @OA\RequestBody(
         *         required=true,
         *         @OA\JsonContent(
         *             required={"email","password"},
         *             @OA\Property(property="email", type="string", format="email"),
         *             @OA\Property(property="password", type="string", format="password")
         *         )
         *     ),
         *     @OA\Response(
         *         response="200",
         *         description="Login success",
         *         @OA\JsonContent(
         *             @OA\Property(property="access_token", type="string"),
         *             @OA\Property(property="refresh_token", type="string")
         *         )
         *     )
         * )
     */
    public function login()
    {
        return 1;
    }

    /**
        * @OA\Post(
        *    summary="Register user",
        *    tags={"Authentication"},
        *    path="/api/auth/register",
        *     @OA\RequestBody(
        *         required=true,
        *         @OA\JsonContent(
        *             required={"name","email","password"},
        *             @OA\Property(property="name", type="string", format="name"),
        *             @OA\Property(property="email", type="string", format="email"),
        *             @OA\Property(property="password", type="string", format="password")
        *         )
        *     ),
        *    @OA\Response(response="200", description="Register success")
        * )
    */

    public function register()
    {
        return 1;
    }
}
