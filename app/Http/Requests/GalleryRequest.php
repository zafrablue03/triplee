<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'image'     =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=50,max_width=2000, min_height=50, max_height=2000',
        ];
    }
}
