<x-app-layout>
@if(session()->has('message'))
<div sytle="background-color:green; color:green; text-align:center;">
    <button type="button" data-dismiss="alert" style="right:0; text-align:right; justify-content: right; align-items: right; color:red;">| x |</button>
    {{session()->get('message')}}
</div>
@endif
<h1 style="font-size:300%; text-align:center;">Past Orders</h1>
<div style="text-align:center;">
    <form action="{{url('orderagain')}}" method="POST">
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
            <td style="padding-left: 30px;">Data and Time</td>
            <td style="padding-left: 30px;">Image</td>
            <td style="padding-left: 30px;">Order Again</td>
        </tr>
@foreach($past as $pasts)
        <tr>
            <td style="padding-left: 30px;"><input type="text" name="product_title[]" value="{{$pasts->product_title}}" hidden="True">{{$pasts->product_title}}</td>
            <td style="padding-left: 30px;"><input type="text" name="product_size[]" value="{{$pasts->Product_size}}" hidden="True">{{$pasts->Product_size}}</td>
            <td style="padding-left: 30px;"><input type="text" name="product_price[]" value="{{$pasts->Product_price}}" hidden="True">{{$pasts->Product_price}}</td>
            <td style="padding-left: 30px;"><input type="text" name="Product_topping_1[]" value="{{$pasts->Product_topping_1}}" hidden="True">{{$pasts->Product_topping_1}}</td>
            <td style="padding-left: 30px;"><input type="text" name="Product_topping_2[]" value="{{$pasts->Product_topping_2}}" hidden="True">{{$pasts->Product_topping_2}}</td>
            <td style="padding-left: 30px;"><input type="text" name="Product_topping_3[]" value="{{$pasts->Product_topping_3}}" hidden="True">{{$pasts->Product_topping_3}}</td>
            <td style="padding-left: 30px;"><input type="text" name="extra_toppings[]" value="{{$pasts->extra_toppings}}" hidden="True">{{$pasts->extra_toppings}}</td>
            <td style="padding-left: 30px;"><input type="text" name="quantity[]" value="{{$pasts->quantity}}" hidden="True">{{$pasts->quantity}}</td>
            <td style="padding-left: 30px;"><input type="text" name="date[]" value="{{$pasts->created_at}}" hidden="True">{{$pasts->created_at}}</td>
            <td style="padding-left: 30px;"><input type="text" name="product_image[]" value="{{$pasts->Product_image}}" hidden="True"><img src="{{URL($pasts->Product_image)}}" alt="Product Image" height="50px" width="50px"></td>

            <input type="text" name="product_id[]" value="{{$pasts->id}}" hidden="True">
            

            <td style="padding-left: 30px; color:green;"><a href="{{url('orderagain')}}"><button>Order Again</button></a></td>
        </tr>
@endforeach
    </table>

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