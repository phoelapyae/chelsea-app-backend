<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'avatar' => 'required',
            'name' => 'required',
            'number' => 'nullable',
            'height' => 'nullable',
            'weight' => 'nullable',
            'birthplace' => 'nullable',
            'date_of_birth' => 'nullable',
            'nation_id' => 'required',
            'position_id' => 'required',
            'team_type_id' => 'required',
            'work_type_id' => 'required',
            'biography' => 'required'
        ];
    }
}
