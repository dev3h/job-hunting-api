<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $table = collect([
            'employee.api.*' => 'employees',
            'admin.api.*' => 'admins',
            'api.*' => 'users',
        ])->first(fn($value, $key) => $this->routeIs($key));
        return [
            'email' => [
                'required',
                'email',
                Rule::exists($table, 'email')->whereNull('deleted_at'),
            ],
            'password' => 'required|string|between:8,16',
        ];
    }
}
