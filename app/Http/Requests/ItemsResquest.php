<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;
use App\Http\Resources\PaymentResource;

class ItemsRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }
   
    public function rules()
    {
        return [
             
            'qtd' => 'required|max:255',
            'value' => 'required|max:255',                                          
            'payment_id' => [
                'required',
                (new Exists('payments','id'))
                    ->where('user_id', \Tenant::getTenant()->id)
            ]
           
        ];
    }
}
