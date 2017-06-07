<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ActionRequest extends Request
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
            'title_ru' => 'required|max:200',
            'title_ua' => 'required|max:200',
            'content_ru' => 'required|max:65000',
            'content_ua' => 'required|max:65000',
            'image' => 'image',
            'endData' => 'required',
            'status' => 'required',
        ];
    }
}
