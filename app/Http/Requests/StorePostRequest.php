<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|min:5|max:255',
            'slug' => ['required', 'max:255', 'unique:posts,slug'],
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required',
            'published_at' => 'nullable|date',
        ];


        switch ($this->method()) {
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:posts,slug,'.$this->route('post');
                break;
        }

        return $rules;
    }
}
