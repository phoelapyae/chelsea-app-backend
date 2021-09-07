<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketCategoryRequest extends FormRequest
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
            'matches_id' => 'required|array',
            'date' => 'required',
            'status' => 'required',
            'name' => 'required',
            'limit_count' => 'required',
        ];
    }
}
