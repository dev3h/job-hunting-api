<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthServices\AuthService;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function __construct(protected AuthService $authService)
    {
       
    }
    /**
     * @OA\Post(
     *     summary="Login for API guard",
     *     tags={"Authentication"},
     *     path="/api/auth/login",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"email","password"},
     *
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response="200",
     *         description="Login success",
     *
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string"),
     *             @OA\Property(property="refresh_token", type="string")
     *         )
     *     )
     * )
     *
     * @OA\Post(
     *     summary="Login for Employee guard",
     *     tags={"Authentication"},
     *     path="/api/employee/auth/login",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"email","password"},
     *
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response="200",
     *         description="Login success",
     *
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string"),
     *             @OA\Property(property="refresh_token", type="string")
     *         )
     *     )
     * )
     *
     * @OA\Post(
     *     summary="Login for Admin guard",
     *     tags={"Authentication"},
     *     path="/api/admin/auth/login",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"email","password"},
     *
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response="200",
     *         description="Login success",
     *
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string"),
     *             @OA\Property(property="refresh_token", type="string")
     *         )
     *     )
     * )
     */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        return $this->authService->login($data, $request);
    }

    /**
     * @OA\Get(
     *     summary="Get authenticated user for API guard",
     *     tags={"Authentication"},
     *     security={{"bearer_token":{}}},
     *     path="/api/me",
     *     @OA\Response(
     *         response="200",
     *         description="Authenticated user data",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string")
     *         )
     *     )
     * )
     *
     * @OA\Get(
     *     summary="Get authenticated user for Employee guard",
     *     tags={"Authentication"},
     *     security={{"bearer_token":{}}},
     *     path="/api/employee/me",
     *     @OA\Response(
     *         response="200",
     *         description="Authenticated user data",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string")
     *         )
     *     )
     * )
     *
     * @OA\Get(
     *     summary="Get authenticated user for Admin guard",
     *     tags={"Authentication"},
     *     security={{"bearer_token":{}}},
     *     path="/api/admin/me",
     *     @OA\Response(
     *         response="200",
     *         description="Authenticated user data",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string")
     *         )
     *     )
     * )
     */
    public function me(Request $request)
    {
        return $this->authService->me($request);
    }

    /**
     * @OA\Post(
     *     summary="Refresh token for API guard",
     *     tags={"Authentication"},
     *     path="/api/refresh",
     *     security={{"bearer_token":{}}},
     *     @OA\Response(
     *         response="200",
     *         description="Token refreshed",
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string"),
     *             @OA\Property(property="refresh_token", type="string")
     *         )
     *     )
     * )
     *
     * @OA\Post(
     *     summary="Refresh token for Employee guard",
     *     tags={"Authentication"},
     *     path="/api/employee/refresh",
     *     security={{"bearer_token":{}}},
     *     @OA\Response(
     *         response="200",
     *         description="Token refreshed",
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string"),
     *             @OA\Property(property="refresh_token", type="string")
     *         )
     *     )
     * )
     *
     * @OA\Post(
     *     summary="Refresh token for Admin guard",
     *     tags={"Authentication"},
     *     path="/api/admin/refresh",
     *     security={{"bearer_token":{}}},
     *     @OA\Response(
     *         response="200",
     *         description="Token refreshed",
     *         @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string"),
     *             @OA\Property(property="refresh_token", type="string")
     *         )
     *     )
    * )
     */
    public function refresh(Request $request)
    {
        return $this->authService->refresh($request);
    }

    /**
     * @OA\Post(
     *    summary="Register user",
     *    tags={"Authentication"},
     *    path="/api/auth/register",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"name","email","password"},
     *
     *             @OA\Property(property="name", type="string", format="name"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password")
     *         )
     *     ),
     *
     *    @OA\Response(response="200", description="Register success")
     * )
     */
    public function register()
    {
        return 1;
    }
}
