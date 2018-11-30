<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemsRequest;
use App\Http\Resources\ItemsResource;
use App\Http\Resources\ItemCollection;
use App\Models\Item;

class ItemsController extends Controller
{
   
    public function index()
    {
        $items = Item::with('payment')->paginate();
        return new ItemCollection($items);
    }

    public function store(ItemsRequest $request)
    {
        $items = Item::create($request->all());
        return new ItemsResource($items);
    }

    public function show(Items $items)
    {
        return new ItemsResource($items);
    }

    public function update(ItemsRequest $request, Items $items)
    {
        $items->fill($request->all());
        $items->save();

        return new ItemsResource($items);
    }

    public function destroy(ItemsRequest $items)
    {
        $items->delete();

        return response()->json([],204);
    }
}
