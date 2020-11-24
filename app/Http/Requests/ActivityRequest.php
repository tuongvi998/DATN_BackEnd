<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ActivityRequest extends FormRequest
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
        if($request->isMethod('POST')){
            return [
                'id'=>'required|unique:activity_details',
                'group_id'=>'required',
                'title' =>'required',
                'start_date' => 'required|date|before:end_date',
                'end_date' => 'required|date|after:start_date',
                'close_date' => 'required|date|before:start_date',
                'address' => 'required|string',
                'conten' => 'required|string',
                'max_register' => 'required|number|max:500000000|gt:min_register|min:1',
                'min_register' => 'required|number|max:500000000|min:1',
                'image' => 'string|url',
                'donate'=> 'required|int|max:1000000000',
                'cost' => 'required|number|max:1000000000'
            ];
        }
        else{
            return [
            'title' =>'required',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'close_date' => 'required|date|before:start_date',
            'address' => 'required|string',
            'conten' => 'required|string',  //content controller error
            'max_register' => 'required|int|max:500000000|gt:min_register|min:1',
            'min_register' => 'required|int|max:500000000|min:1',
            'image' => 'string|url',
            'donate'=> 'required|int|max:1000000000',
            'cost' => 'required|int|max:1000000000'
            ];
        }
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
