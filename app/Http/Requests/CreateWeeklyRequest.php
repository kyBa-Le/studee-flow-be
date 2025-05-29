<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWeeklyRequest extends FormRequest
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
        return [
            'student_id' => 'required|exists:users,id',
            'week_id' => 'required|exists:weeks,id',
            'goal' => 'nullable|string|max:1000',
            'is_achieved' => 'sometimes|boolean',
        ];
    }
}
