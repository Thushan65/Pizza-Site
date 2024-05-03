<?php

namespace App\Http\Controllers;

use App\Models\Pizzas;
use App\Models\toppings;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PizzasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $AllPizzas = Pizzas::get();
        return view('pizzas.index',compact('AllPizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=auth()->user();
        $past=Order::where('customer_id',$user->id)->get();
        return view('pizzas.viewpast',compact('past'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=auth()->user();
        $name=$user->name;
        $userid=$user->id;

        foreach($request->product_id as $key=>$product_id)
        {
            $order=new Order;
            $order->product_title=$request->product_title[$key];
            $order->Product_size=$request->product_size[$key];
            $order->Product_price=$request->product_price[$key];
            $order->Product_topping_1=$request->Product_topping_1[$key];
            $order->Product_topping_2=$request->Product_topping_2[$key];
            $order->Product_topping_3=$request->Product_topping_3[$key];
            $order->extra_toppings=$request->extra_toppings[$key];
            $order->quantity=$request->quantity[$key];
            $order->product_image=$request->product_image[$key];

            $order->total_price=$request->total;
            $order->dc=$request->dc;

            $order->customer_name=$name;
            $order->customer_id=$userid;

            $order->save();
        }

        DB::table('carts')->where('customer_id',$userid)->delete();
        return redirect('/pizzas')->with('message','Order Completed');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user=auth()->user();
        $cart=Cart::where('customer_id',$user->id)->get();
        return view('pizzas.showcart',compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Pizzas::find($id);
        $data2= toppings::get();

        return view('pizzas.customizepizza',compact('data','data2'));
    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id()){
            $user=auth()->user();
            $product=Pizzas::find($id);
            $cart=new cart;
            $cart->customer_id=$user->id;
            $cart->customer_name=$user->name;
            $cart->product_title=$product->name;
            $cart->Product_image=$product->image;
            $cart->quantity=$request->quantity;
            $cart->Product_size=$request->size;
            $cart->Product_price=$request->price;
            $cart->Product_topping_1=$request->topping_1;
            $cart->Product_topping_2=$request->topping_2;
            $cart->Product_topping_3=$request->topping_3;
            $cart->extra_toppings=$request->show_toppings;

            $cart->save();
           // $cart->qu
            return redirect('/pizzas')->with('message','Pizza added Successfully');
        }
        else{
            return redirect('login');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach($request->product_id as $key=>$product_id){

        $user=auth()->user();
        $cart=new cart;
        $cart->customer_id=$user->id;
        $cart->customer_name=$user->name;

        $cart->product_title=$request->product_title[$key];
        $cart->Product_image=$request->product_image[$key];
        $cart->quantity=$request->quantity[$key];
        $cart->Product_size=$request->product_size[$key];
        $cart->Product_price=$request->product_price[$key];
        $cart->Product_topping_1=$request->Product_topping_1[$key];
        $cart->Product_topping_2=$request->Product_topping_2[$key];
        $cart->Product_topping_3=$request->Product_topping_3[$key];
        $cart->extra_toppings=$request->extra_toppings[$key];

        $cart->save();
        return redirect('/pizzas/showcart')->with('message','Pizza added Successfully');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message','Pizza removed Successfully.');
    }
}
