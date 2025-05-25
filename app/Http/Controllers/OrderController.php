<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Http\Resources\OrderResource;
use App\Exceptions\MaxOrderTotalExceeded;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $r)
    {

        $validator = Validator::make($r->all(), [
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }



        $order = $r->user()->orders()->create(['total' => 0]);
        $total = 0;

        foreach ($data['items'] as $it) {
            $prod = Product::find($it['product_id']);


            if ($prod->price == 0) {
                throw new \Exception("لا يمكن طلب منتج مجاني: $prod->name");
            }

            $order->items()->create([
                'product_id' => $prod->id,
                'qty' => $it['qty'],
                'price' => $prod->price,
            ]);
            $total += $prod->price * $it['qty'];
        }


        $order->update(['total' => $total]);

        // lazy-eager load to avoid N+1 in Resource
        $order->load('items.product');
        return new OrderResource($order);
    }

    public function index(Request $r)
    {
        $orders = $r->user()->orders()->with('items.product')->latest()->get();
        return OrderResource::collection($orders);
    }
}
