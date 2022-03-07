<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        if(auth()->check() && auth()->user()->type == 0){
            return false;
        }
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|alpha|max:16',
            'email' => 'required|string|email|unique:users',
            'phone_number' => 'required|string',
            'password' => 'required|string|min:5|confirmed'
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
