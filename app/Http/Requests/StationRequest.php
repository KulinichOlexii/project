<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StationRequest extends Request
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
            /*'name_ua' => 'required|max:70',*/
            'city_id' => 'required',
            'address_ru' => 'required|max:120',
            'address_ua' => 'required|max:120',
            'lat' => 'required|max:100|numeric',
            'lng' => 'required|max:100|numeric',
            'content_ru' => 'required|max:65000',
            'content_ua' => 'required|max:65000',
        ];

    }
}
