<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:21',
            'user_type' => 'required',
            'belongs_to' => 'required',
            'role' => 'required',
            'accesses' => 'required',
            'permissions' => 'required',
            'name' => 'nullable',
            'profile_image' => 'nullable'
        ];
    }
}
