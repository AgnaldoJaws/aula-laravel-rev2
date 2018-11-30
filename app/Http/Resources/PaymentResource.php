<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'method' => $this->method,
            'hash' => $this->hash,
            'total' => $this->total,
            'token' => $this->token
        ];
    }
}
