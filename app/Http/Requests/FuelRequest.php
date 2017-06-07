<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FuelRequest extends Request
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
            'name_ru' => 'required|max:60',
            'name_ua' => 'required|max:60',
            'title_ru' => 'required|max:254',
            'title_ua' => 'required|max:254',
            'text_ru' => 'required|max:65000',
            'text_ua' => 'required|max:65000',
            'price' => 'required|numeric',
            'image' => 'image',
        ];
    }
}
