<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
class RegisterProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if($request->isMethod('POST')){
            return [
//                'id'=>'required|unique:activity_details',
                'volunteer_user_id'=>'required',
                'activity_id' =>'required',
                'isAccept' => 'required|boolean',
                'register_date' => 'required|date|after:start_date',
                'introduction' => 'required|string',
                'interest' => 'required|string',
            ];
        }
        else{
            return [
                'volunteer_id'=>'required',
                'activity_id' =>'required',
                'isAccept' => 'required|date|before:end_date',
                'register_date' => 'required|date|after:start_date',
                'introduction' => 'required|string',
                'interest' => 'required|string',
            ];
        }
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
