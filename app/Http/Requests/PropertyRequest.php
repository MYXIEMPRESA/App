<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class PropertyRequest extends FormRequest
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
        $method = strtolower($this->method());

        $rules = [];
        switch ($method) {
            case 'post':
                $rules = [
                    'name' => 'required',
                    'price' => 'required|numeric',
                    'age_of_property' => 'required|numeric',
                    'maintenance' => 'required|numeric',
                    'security_deposit' => 'required|numeric',
                    'brokerage' => 'required|numeric',
                    'sqft' => 'required',
                    'description' => 'required',
                    'country' => 'required',
                    'state' => 'required',
                    'city' => 'required',
                    'address' => 'required',

                ];
                break;
            case 'patch':
                $rules = [
                    'name' => 'required',
                    'price' => 'required|numeric',
                    'age_of_property' => 'required|numeric',
                    'maintenance' => 'required|numeric',
                    'security_deposit' => 'required|numeric',
                    'brokerage' => 'required|numeric',
                    'sqft' => 'required',
                    'description' => 'required',
                    'country' => 'required',
                    'state' => 'required',
                    'city' => 'required',
                    'address' => 'required',
                ];
                break;
        }

        return $rules;
    }

    public function messages()
    {
        return [ ];
    }

     /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $data = [
            'status' => true,
            'message' => $validator->errors()->first(),
            'all_message' =>  $validator->errors()
        ];

        if ( request()->is('api*')){
           throw new HttpResponseException( response()->json($data,422) );
        }

        if ($this->ajax()) {
            throw new HttpResponseException(response()->json($data,422));
        } else {
            throw new HttpResponseException(redirect()->back()->withInput()->with('errors', $validator->errors()));
        }
    }
}