<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ActivityUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'council' => 'required|exists:councils,id',
            'association' => 'required|exists:associations,id',
            'program' => 'required|exists:programs,id',

            'activity_title' => 'required',
            'remarks' => 'required|boolean',
            'start_date' => 'nullable|date_format:Y-m-d|before:tomorrow',
            'end_date' => 'nullable|date_format:Y-m-d|after:start_date',
            'venue' => 'nullable',
            'number_of_trainers' => 'nullable|integer',
            'trainers' => 'nullable|array',
            'number_of_trainees' => 'nullable|integer',
            'trainees' => 'nullable|array',

            'source_of_fund' => 'nullable',//Dropdown 1. GOB, 2. Development budgets 3.Council Association 4. Others
            'budget_as_per_contract' => 'nullable|digits_between:1,99999999999999',
            'actual_budget_as_per_expenditure' => 'nullable|digits_between:1,99999999999999',
            'actual_expenditure_as_per_actual_budget' => 'nullable|digits_between:1,99999999999999',
        ];
    }
}
