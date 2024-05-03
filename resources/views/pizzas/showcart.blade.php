<x-app-layout>

@if(session()->has('message'))
<div>
    <button type="button" data-dismiss="alert">x</button>
    {{session()->get('message')}}
</div>
@endif

    <h1>Cart</h1>
    <form action="{{url('order')}}" method="POST">
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
            <td>Image</td>
            <td>Remove</td>
        </tr>
@foreach($cart as $carts)
        <tr>
            <td><input type="text" name="product_title[]" value="{{$carts->product_title}}" hidden="True">{{$carts->product_title}}</td>
            <td><input type="text" name="product_size[]" value="{{$carts->Product_size}}" hidden="True">{{$carts->Product_size}}</td>
            <td><input type="text" name="product_price[]" value="{{$carts->Product_price}}" hidden="True">{{$carts->Product_price}}</td>
            <td><input type="text" name="Product_topping_1[]" value="{{$carts->Product_topping_1}}" hidden="True">{{$carts->Product_topping_1}}</td>
            <td><input type="text" name="Product_topping_2[]" value="{{$carts->Product_topping_2}}" hidden="True">{{$carts->Product_topping_2}}</td>
            <td><input type="text" name="Product_topping_3[]" value="{{$carts->Product_topping_3}}" hidden="True">{{$carts->Product_topping_3}}</td>
            <td><input type="text" name="extra_toppings[]" value="{{$carts->extra_toppings}}" hidden="True">{{$carts->extra_toppings}}</td>
            <td><input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden="True">{{$carts->quantity}}</td>
            <td><input type="text" name="product_image[]" value="{{$carts->Product_image}}" hidden="True"><img src="{{URL($carts->Product_image)}}" alt="Product Image" height="50px" width="50px"></td>

            <input type="text" name="product_id[]" value="{{$carts->id}}" hidden="True">
            

            <td><a href="{{url('delete',$carts->id)}}"><button>Remove</button></a></td>
        </tr>
@endforeach
    </table>

    <script>
    function calculateTotal() {
        var total = 0;
        var productPrices = document.getElementsByName('product_price[]');
        for (var i = 0; i < productPrices.length; i++) {
            total += parseFloat(productPrices[i].value);
        }
        if (document.getElementById('delivery').checked) {
            total += 5; // Add 5 if delivery is selected
            document.getElementById('dc').value ='Delivery';
        }else{
            document.getElementById('dc').value ='Collection';
        }
        document.getElementById('total').value = total.toFixed(2); // Display total in the total field
    }
    </script>

    <input type="radio" name="delivery/collection" value="delivery" id="delivery" class="radio" onclick="calculateTotal()">
    <label for="delivery">Delivery</label>
    <input type="radio" name="delivery/collection" value="collection" id="collection" class="radio" onclick="calculateTotal()">
    <label for="collection">collection</label>
    <br>
    <h3>Total Price</h3>
    <label for="total">Total:</label>
    <input type="number" name="total" id="total" readonly>

    <input type="text" name="dc" id="dc" readonly hidden="True">
    <br>
    <button>Confirm Order</button>

    </form>
</x-app-layout>