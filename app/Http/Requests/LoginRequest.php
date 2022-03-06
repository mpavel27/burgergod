<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        if (auth()->check()) {
            return false;
        }
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
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
