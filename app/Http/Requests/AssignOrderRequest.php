<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AssignOrderRequest extends FormRequest
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
            'id_order' => 'required|integer',
            'delivery_boy' => 'required|integer'
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
