<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class createItemRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'grams' => 'required|numeric',
            'calories' => 'required|numeric',
            'category' => 'required|integer',
            'image' => 'required|mimes:jpg,png,jpeg'
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
