<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function add(OrderRequest $request)
    {

        $basket = Session::get('basket');
        if (isset($basket)) {
            $userId = auth()->user()->id;

            $order = Order::create(
                [
                    'user_id' => $userId,
                    'status_id' => 1,
                ]
            );
            $order->save();

            $insertData = [];
            foreach (array_keys($basket) as $item) {
                for ($i = 0; $i < $basket[$item]; $i++) {
                    $insertData[] = ['product_id' => $item, 'order_id' => $order->id];
                }

            }

            DB::table('order_product')->insert($insertData);
            Session::put('basket', null);
            return redirect(route('account'));
        } else {
            return redirect()->intended();
        }
    }
}
