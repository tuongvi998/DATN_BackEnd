<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if($request->isMethod('POST'))
        return  [
            'email' => 'required|unique:users|string|max:225',
            'password' => 'required|min:8|string'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu đăng nhập',
            'password.min' => 'Mật khẩu tối thiểu 8 kí tự',
        ];
    }
}
