<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraineeStoreRequest extends FormRequest
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
            'activity' => 'required',
            'name' => 'required',
            'age' => 'nullable',
            'gender' => 'required',
            'qualification' => 'nullable',
            'organization' => 'nullable',
            'designation' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'covid_status' => 'required',
        ];
    }
}
