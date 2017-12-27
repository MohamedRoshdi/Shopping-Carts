<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    Display carts and it's items
    public function index()
    {
        $carts = Cart::all();
        $orders = DB::table('orders')
                    ->join('carts', 'carts.cart_id','=', 'orders.cart_id')
                    ->join('products', 'products.product_id','=', 'orders.product_id')
                    ->get();      // get data from Orders table
        $data = array("carts" => $carts, "orders" => $orders);

        return view('carts', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

//    Create new Cart
    public function create(Request $request)
    {
        // Validation
        $request->validate([
//            'cart_name' => 'required|unique:carts'

        ]);

        $data = $request->all();
        DB::table('carts')->insert(
            ['cart_name' => $data['cartName']]
        );

        // redirect
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'cart_id' => 'required:carts'
        ]);

//        Store
        $data = $request->all();
        $row = Order::where('cart_id',$data['cart_id'])->
                          where('product_id',$data['product_id'])
                          ->get();
        if($row ->count()){
//            Just update the quantity and total price because it already exist.
            $total = (int)$row[0]->order_total_price + (int)$data['price'];

            $order = Order::where('order_id','=',$row[0]->order_id);
//            $order->order_quantity = $row[0]->order_quantity + 1;
//            $order->order_total_price = $total;
//            $order->update();
            DB::table('orders')
                ->where('order_id', $row[0]->order_id)
                ->update(['order_quantity' => $row[0]->order_quantity + 1,
                    'order_total_price' => $total]);
        }else{
//            Add New Item To Database
            $order = new Order;
            $order->cart_id = $data['cart_id'];
            $order->order_quantity = 1;
            $order->order_total_price = $data['price'];
            $order->product_id = $data['product_id'];
            $order->save();
        }


        // redirect
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
//            'cart_id' => 'required:carts',
//            'order_price' => 'required'
        ]);

        //store
        $data=$request->all();
        $total = (float)$data['updateOrderPrice'] * $data["updateQuantity"];
//        $order = Order::where('cart_id',$id);
//        $order->order_quantity = $data["updateQuantity$id"];
//        $order->order_total_price = $total;
//        $order->update();
        DB::table('orders')
            ->where('order_id', $data['updateOrderId'])
            ->update(['order_quantity' => $data["updateQuantity"],
                'order_total_price' => $total]);

        //redirect
        return back();
    }


    public function updateOrder(Request $request, $id)
    {
        dd($id);
        //validation
        $request->validate([
//            'cart_id' => 'required:carts',
//            'order_price' => 'required'
        ]);

        //store
        $data=$request->all();
        $total = (float)$data['price'] * $data["updateQuantity$id"];

        DB::table('orders')
            ->where('order_id', $id)
            ->update(['order_quantity' => $data["updateQuantity$id"],
                'order_total_price' => $total]);

        //redirect
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//    Empty all data in cart
    public function destroy($id)
    {
        Order::where('cart_id',$id)->delete();
        return back();
    }

//    Just delete one item in cart
    public function deleteOrder($id)
    {
        dd($id);
        Order::where('order_id',$id)->delete();
        return back();
    }

}
