<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            "title"=>"required|string|max:40|min:9",
            "content"=>"required|string|max:255|min:30",
            "location_id"=>"required|numeric",
            "type"=>"required|numeric",
            "user_id"=>"numeric"
        ];
    }
}
