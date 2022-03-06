<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class createCategoryRequest extends FormRequest
{
    public function authorize()
    {
        if(auth()->check()){
            return true;
        }
        return false;
    }

    public function rules()
    {
        return [
            'name' => 'required|string'
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
