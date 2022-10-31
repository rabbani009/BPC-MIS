<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainerStoreRequest extends FormRequest
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
            'council' => 'required|integer|exists:councils,id',
            'association' => 'required|integer|exists:associations,id',
            'program' => 'required|integer',
            'trainer_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'nullable',
            'gender' => 'alpha',
            'area_of_expertise' => 'nullable',
        ];
    }
}
