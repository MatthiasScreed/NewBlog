<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => 'email|required|unique:users,email,' . $this->route("users"),
            'password' => 'required_with:password_confirmation|confirmed',
            'role'     => 'required',
            'slug'     => 'required|unique:users,slug,' . $this->route("users"),
        ];
    }
}
