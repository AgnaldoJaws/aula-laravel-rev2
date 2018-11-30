<?php

namespace App\Http\Resources;

use App\Models\Item;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentItemCollection extends ResourceCollection
{
    private $payment;

    public function __construct($resource, $payment)
    {
        parent::__construct($resource);
        $this->payment = $payment;
    }

    public function toArray($request)
    {
        return [           
            'payment' => new PaymentResource($this->payment),
            'items' => $this->collection->map(function ($item) {
                return new ItemsResource($item);
            })
            
        ];
    }
}
