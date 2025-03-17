<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @OA\Post(
     *     summary="Create new job employ",
     *     tags={"Job Employ"},
     *     path="/api/employee/job-employ",
     *
    *     @OA\Parameter(
     *         name="step",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer"),
     *         description="Step of the job creation process"
     *     ),
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"title","type","categories","salary_range","required_skills","description","responsibility","qualification","nice_to_have","benefit"},
     *
        *             @OA\Property(property="title", type="string"),
        *             @OA\Property(property="type", type="array", @OA\Items(type="string")),
        *             @OA\Property(property="categories", type="array", @OA\Items(type="string")),
        *             @OA\Property(property="salary_range", type="array", @OA\Items(type="string")),
        *             @OA\Property(property="required_skills", type="array", @OA\Items(type="string")),
        *             @OA\Property(property="description", type="string"),
        *             @OA\Property(property="responsibility", type="string"),
        *             @OA\Property(property="qualification", type="string"),
        *             @OA\Property(property="nice_to_have", type="string"),
        *             @OA\Property(property="benefit", type="string")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response="200",
     *         description="Job employ created",
     *
     *     )
     * )
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
    }
}
