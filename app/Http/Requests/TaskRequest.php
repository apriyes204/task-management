<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        $isUpdateRoute = $this->routeIs('tasks.update');

        return [
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'remove_image' => 'required|in:true,false',
            // 'user_id' => 'required|exists:users,id'
        ];

        return $rules;
    }
}
