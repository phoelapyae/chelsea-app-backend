<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchDayPackageRequest extends FormRequest
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
            'cover_image' => 'required',
            'bg_image' => 'required',
            'package_images' => 'required',
            'matches_id' => 'required|array',
            'name' => 'required',
            'price' => 'required',
            'limit_count' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required'
        ];
    }
}
