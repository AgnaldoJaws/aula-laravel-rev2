<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::paginate();
        return PaymentResource::collection($payment);
    }

    public function store(PaymentRequest $request)
    {
        $payment = Payment::create($request->all());
        return new PaymentResource($payment);
    }

    public function show(Payment $payment)
    {
        return new PaymentResource($payment);
    }

    public function update(PaymentRequest $request, Payment $payment)
    {
        $payment->fill($request->all());
        $payment->save();

        return new PaymentResource($payment);
    }

    public function destroy(PaymentRequest $payment)
    {
        $payment->delete();

        return response()->json([],204);
    }
}
