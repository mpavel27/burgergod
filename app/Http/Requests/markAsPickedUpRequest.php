<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class markAsPickedUpRequest extends FormRequest
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
            'id_order' => 'required|integer'
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
