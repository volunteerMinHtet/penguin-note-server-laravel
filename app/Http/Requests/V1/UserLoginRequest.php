<?php

namespace App\Http\Requests\V1;

use App\V1\Traits\ResponseAPI;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserLoginRequest extends FormRequest
{
    use ResponseAPI;

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
            'user_name' => 'required|string|max:255',
            'password' => 'required|max:255'
        ];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException($this->errorResponse('Failed Validation', $validator->errors(), 422));
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Username is required',
            'password.required' => 'Password is required'
        ];
    }
}
