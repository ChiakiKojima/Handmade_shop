<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check(); // ユーザーはログインしている
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'nullable|numeric',
            'postcode' => 'nullable|digits:7',
            'prefecture' => 'nullable|min:3',
            'city' => 'nullable|min:2',
            'no' => 'nullable|min:1'
        ];
    }
}
