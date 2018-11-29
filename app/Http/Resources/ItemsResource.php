<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Payment;

class ItemsResource extends JsonResource
{
    
    public function toArray($request)
    {
       
        return [
            'id' => $this->id,
            'dish_id' => $this->dish_id,
            'payment_id' => $this->payment_id,
            'qtd' => $this->qtd,
            'value' => $this->value,
            'user_id' => $this->user_id,
            'payment' => new PaymentResource($this->payment)
            
        ];
    }
}
