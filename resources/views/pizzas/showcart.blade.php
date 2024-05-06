<x-app-layout>

@if(session()->has('message'))
<div sytle="background-color:green; color:green; text-align:center;">
    <button type="button" data-dismiss="alert" style="right:0; text-align:right; justify-content: right; align-items: right; color:red;">| x |</button>
    {{session()->get('message')}}
</div>
@endif

<div style="text-align:center;">
    <h1 style="font-size:300%; text-align:center;">Cart</h1>
    <br>
    <form action="{{url('order')}}" method="POST">
    @csrf
    <table style="text-align:center;  justify-content: center; align-items: center;">
        <tr style="color:yellow;">
            <td style="padding-left: 30px;">Name</td>
            <td style="padding-left: 30px;">Size</td>
            <td style="padding-left: 30px;">Price</td>
            <td style="padding-left: 30px;">Topping 1</td>
            <td style="padding-left: 30px;">Topping 2</td>
            <td style="padding-left: 30px;">Topping 3</td>
            <td style="padding-left: 30px;">Extra Toppings</td>
            <td style="padding-left: 30px;">Quantity</td>
            <td style="padding-left: 30px;">Image</td>
            <td style="padding-left: 30px;">Remove</td>
        </tr>
@foreach($cart as $carts)
        <tr>
            <td style="padding-left: 30px;"><input type="text" name="product_title[]" value="{{$carts->product_title}}" hidden="True">{{$carts->product_title}}</td>
            <td style="padding-left: 30px;"><input type="text" name="product_size[]" value="{{$carts->Product_size}}" hidden="True">{{$carts->Product_size}}</td>
            <td style="padding-left: 30px;"><input type="text" name="product_price[]" value="{{$carts->Product_price}}" hidden="True">{{$carts->Product_price}}</td>
            <td style="padding-left: 30px;"><input type="text" name="Product_topping_1[]" value="{{$carts->Product_topping_1}}" hidden="True">{{$carts->Product_topping_1}}</td>
            <td style="padding-left: 30px;"><input type="text" name="Product_topping_2[]" value="{{$carts->Product_topping_2}}" hidden="True">{{$carts->Product_topping_2}}</td>
            <td style="padding-left: 30px;"><input type="text" name="Product_topping_3[]" value="{{$carts->Product_topping_3}}" hidden="True">{{$carts->Product_topping_3}}</td>
            <td style="padding-left: 30px;"><input type="text" name="extra_toppings[]" value="{{$carts->extra_toppings}}" hidden="True">{{$carts->extra_toppings}}</td>
            <td style="padding-left: 30px;"><input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden="True">{{$carts->quantity}}</td>
            <td style="padding-left: 30px;"><input type="text" name="product_image[]" value="{{$carts->Product_image}}" hidden="True"><img src="{{URL($carts->Product_image)}}" alt="Product Image" height="50px" width="50px"></td>

            <input type="text" name="product_id[]" value="{{$carts->id}}" hidden="True">
            

            <td style="padding-left: 30px;"><a href="{{url('delete',$carts->id)}}"><button>Remove</button></a></td>
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
    <br>
    <input type="radio" name="delivery/collection" value="delivery" id="delivery" class="radio" onclick="calculateTotal()">
    <label for="delivery">Delivery</label>
    <input type="radio" name="delivery/collection" value="collection" id="collection" class="radio" onclick="calculateTotal()">
    <label for="collection">collection</label>
    <br><br>
    <h3>Total Price</h3>
    <label for="total">Total:</label>
    <input type="number" name="total" id="total" readonly style="color:black;">

    <input type="text" name="dc" id="dc" readonly hidden="True">
    <br><br>
    <button style="background-color:red;">Confirm Order</button>
    </form>
</div>

<footer style="padding: 100px 0 20px;background: #d8959530;position: relative;">
    <img src="{{URL('images/pizza.png')}}" alt="pizza" id="footeri" style="max-width: 300px;opacity: 0.1;position: absolute;left: 50%;top: 50%;transform: translate(-50%,-50%);">
    <br><br>
    <div class="footerr" style="width: 80%;margin: 0 auto;display: flex;justify-content: space-between;flex-wrap: wrap;">
        <div class="footerleft" style="flex-basis: 45%;padding: 10px;margin-bottom: 20px;">
            <h2 style="margin: 10px 0;">Information</h2>
            <p style="line-height: 35px;">Address:12/A,<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Davidson Road,<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Stoke-on-Trent ST4 1FD.</p>
            <p style="line-height: 35px;">Open hours: Monday to Saturday - 9am to 5pm</p> 
        </div>

        <div class="footerright" style="text-align: right;flex-basis: 45%;padding: 10px;margin-bottom: 20px;">
            <h2 style="margin: 10px 0;">Contact Us:</h2>
            <p style="line-height: 35px;">Mail us:pizzaria@example.com</p>
            <p style="line-height: 35px;">Call us:+44-81050000000</p>
        </div>
    </div>

    <div class="social" style="display:grid; grid-template-columns:repeat(6,minmax(100px, 1fr))">
        <a href="#fb"><img src="{{URL('images/fb.jpg')}}" alt="Facebook" style="height: 40px;width: 40px;border: 1px solid #009688;margin: 40px 5px 0;color: #009688;cursor: pointer;transition: 00.5s;"></a>
        <a href="#whatsapp"><img src="{{URL('images/wtsp.png')}}" alt="Whatsapp" style="height: 40px;width: 40px;border: 1px solid #009688;margin: 40px 5px 0;color: #009688;cursor: pointer;transition: 00.5s;"></a>
        <a href="#ig"><img src="{{URL('images/ig.png')}}" alt="Instergram" style="height: 40px;width: 40px;border: 1px solid #009688;margin: 40px 5px 0;color: #009688;cursor: pointer;transition: 00.5s;"></a>
        <a href="#mail"><img src="{{URL('images/mail.jpg')}}" alt="Gmail" style="height: 40px;width: 40px;border: 1px solid #009688;margin: 40px 5px 0;color: #009688;cursor: pointer;transition: 00.5s;"></a>
        <a href="#linkedin"><img src="{{URL('images/in.png')}}" alt="LinkedIN" style="height: 40px;width: 40px;border: 1px solid #009688;margin: 40px 5px 0;color: #009688;cursor: pointer;transition: 00.5s;"></a>
        <a href="#tiktok"><img src="{{URL('images/tiktok.png')}}" alt="Tiktok" style="height: 40px;width: 40px;border: 1px solid #009688;margin: 40px 5px 0;color: #009688;cursor: pointer;transition: 00.5s;"></a>
    </div>

    <style>
        .social img:hover{
            background: #009688;
            color: whitesmoke;
            transform: translateY(-15px);
        }
    </style>
    
    <p class="copy" style="font-size: 15px;color: #009688;margin-top: 20px;text-align: center;">&copy; Copy Right 2024 </p>           
</footer>
</x-app-layout>