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
            'council' => 'required',
            'association' => 'required',
            'activity' => 'required',
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'covid_status' => 'required',
            'qualification' => 'required',
            'organization' => 'required',
            'designation' => 'required',
        ];
    }
}
