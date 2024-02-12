<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|min:5|max:255',
            'slug' => ['required', 'max:255','unique:posts,slug'],
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'published_at' => 'nullable|date',
        ];

//        dd($this->route('post'));
        switch ($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:posts,slug,'.$this->route('post');
                break;
        }

        return $rules;
    }
}
