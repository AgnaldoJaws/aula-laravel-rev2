<?php

namespace App\Http\Resources;

use App\Models\BillPay;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BillPayCollection extends ResourceCollection
{
    
    public function toArray($request)
    {
        return [
            'about' => [
                'count_paid' => BillPay::paid()->count(),
                'total_paid' => (float) BillPay::paid()->sum('value')
            ],
            'data' => $this->collection->map(function ($billPay) {
                return new BillPayResource($billPay);
            })
        ];
    }
}
