<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $validateRule = [
            '1' => [
                'title' => 'required|string',
                'type' => 'required|array',
                'categories' => 'required|array',
                'salary_range' => 'required|array',
                'required_skills' => 'required|array',
            ],
            '2' => [
                'description' => 'required|string',
                'responsibility' => 'required|string',
                'qualification' => 'required|string',
                'nice_to_have' => 'required|string',
            ],
            '3' => [
                'benefit' => 'required|string'
            ]
        ];
        $step = $this->input('step');
        return $validateRule[$step];
    }
}
