<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Item;

class ItemCollection extends ResourceCollection
{
    
    public function toArray($request)
    {
        return [
            //'value_total' => Items::item()->count(),
            'data' => $this->collection->map(function ($item) {
                return new ItemsResource($item);
            })
            
        ];
    }
}
