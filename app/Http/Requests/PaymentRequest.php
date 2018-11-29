<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        return [
            'method' => 'required|max:255',
            'total' => 'required|max:255'
        ];
    }
}
