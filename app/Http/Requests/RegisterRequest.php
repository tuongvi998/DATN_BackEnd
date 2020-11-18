<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return $request->role_id == 2 ? [
            'role_id' => 'required|int',
            'name' => 'required|max:225|string',
            'email' => 'required|unique:users|string|max:225',
            'password' => 'required|min:8|string',
            'field_id' => 'required|int'
        ]:[
            'role_id' => 'required|int',
            'name' => 'required|max:225|string',
            'email' => 'required|unique:users|string|max:225',
            'password' => 'required|min:8|string'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
