<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_name' => 'required|string',
            'user_email' => 'required|email',
            'user_phone_number' => 'required|string|regex:/^[0-9]*$/',
            'city' => 'required|string',
            'user_address' => 'required|string',
            'payment' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'user_phone_number.regex' => 'Numărul de telefon trebuie sa fie format doar din cifre'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages() as $message) {
            toastr()->error($message[0]);
        }
        return redirect()->back();
    }
}
