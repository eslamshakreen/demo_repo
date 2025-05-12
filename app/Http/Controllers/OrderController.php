<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Http\Resources\OrderResource;
use App\Exceptions\MaxOrderTotalExceeded;

class OrderController extends Controller
{
    public function store(Request $r)
    {
        $data = $r->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qty' => 'required|integer|min:1',
        ]);

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

        if ($total > 10000) {
            // ألغي الطلب الذي أنشأته قبل قليل
            $order->delete();
            throw new MaxOrderTotalExceeded();
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
