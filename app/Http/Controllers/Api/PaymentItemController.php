<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentItemCollection;
use App\Models\Payment;

class PaymentItemController extends Controller
{
    public function index(Payment $payment)
    {        
        $items = $payment->items()->paginate();        
        return new PaymentItemCollection($items, $payment);
        
    }

   
}
