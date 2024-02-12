<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !($this->route('users') == config('cms.default_user_id') || $this->route('users') == auth()->user()->id);
    }

    public function forbiddenResponse()
    {
        return redirect()->back()->with('error-message', 'Tu ne peux pas suprimmer l\'utilisateur par défaut ou toi-même');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
