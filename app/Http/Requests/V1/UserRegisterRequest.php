<?php

namespace App\Http\Requests\V1;

use App\Traits\V1\ResponseApi;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends FormRequest
{
    use ResponseApi;

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
            'device_name' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'user_name' => 'required|string|min:3|max:16|unique:users,user_name',
            'password' => 'required|min:5|max:20'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->errorResponse('Failed Validation', $validator->errors(), 422));
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'user_name.required' => 'Username is required',
            'password.required' => 'Password is required'
        ];
    }
}
