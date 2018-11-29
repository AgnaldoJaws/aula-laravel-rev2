<?php

namespace App\Http\Resources;

use App\Models\BillPay;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryBillPayCollection extends ResourceCollection
{
    private $category;

    public function __construct($resource, $category)
    {
        parent::__construct($resource);
        $this->category = $category;
    }


    public function toArray($request)
    {
        return [
            'about' => [
                'count_paid' => BillPay
                    ::where('category_id', $this->category->id)
                    ->paid()
                    ->count(),
                'total_paid' => (float) BillPay
                    ::where('category_id', $this->category->id)
                    ->paid()
                    ->sum('value')
            ],
            'category' => new CategoryResource($this->category),
            'data' => $this->collection->map(function ($billPay) {
                return new BillPayResource($billPay);
            })
        ];
    }
}
