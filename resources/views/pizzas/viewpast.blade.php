<x-app-layout>
@if(session()->has('message'))
<div>
    <button type="button" data-dismiss="alert">x</button>
    {{session()->get('message')}}
</div>
@endif

    <h1>Past Orders</h1>
    <form action="{{url('orderagain')}}" method="POST">
    @csrf
    <table>
        <tr>
            <td>Name</td>
            <td>Size</td>
            <td>Price</td>
            <td>Topping 1</td>
            <td>Topping 2</td>
            <td>Topping 3</td>
            <td>Extra Toppings</td>
            <td>Quantity</td>
            <td>Data and Time</td>
            <td>Image</td>
            <td>Order Again</td>
        </tr>
@foreach($past as $pasts)
        <tr>
            <td><input type="text" name="product_title[]" value="{{$pasts->product_title}}" hidden="True">{{$pasts->product_title}}</td>
            <td><input type="text" name="product_size[]" value="{{$pasts->Product_size}}" hidden="True">{{$pasts->Product_size}}</td>
            <td><input type="text" name="product_price[]" value="{{$pasts->Product_price}}" hidden="True">{{$pasts->Product_price}}</td>
            <td><input type="text" name="Product_topping_1[]" value="{{$pasts->Product_topping_1}}" hidden="True">{{$pasts->Product_topping_1}}</td>
            <td><input type="text" name="Product_topping_2[]" value="{{$pasts->Product_topping_2}}" hidden="True">{{$pasts->Product_topping_2}}</td>
            <td><input type="text" name="Product_topping_3[]" value="{{$pasts->Product_topping_3}}" hidden="True">{{$pasts->Product_topping_3}}</td>
            <td><input type="text" name="extra_toppings[]" value="{{$pasts->extra_toppings}}" hidden="True">{{$pasts->extra_toppings}}</td>
            <td><input type="text" name="quantity[]" value="{{$pasts->quantity}}" hidden="True">{{$pasts->quantity}}</td>
            <td><input type="text" name="date[]" value="{{$pasts->created_at}}" hidden="True">{{$pasts->created_at}}</td>
            <td><input type="text" name="product_image[]" value="{{$pasts->Product_image}}" hidden="True"><img src="{{URL($pasts->Product_image)}}" alt="Product Image" height="50px" width="50px"></td>

            <input type="text" name="product_id[]" value="{{$pasts->id}}" hidden="True">
            

            <td><a href="{{url('orderagain')}}"><button>Order Again</button></a></td>
        </tr>
@endforeach
    </table>

    </form>
</x-app-layout>