<x-app-layout>
@if(session()->has('message'))
<div sytle="background-color:green; color:green; text-align:center;">
    <button type="button" data-dismiss="alert" style="right:0; text-align:right; justify-content: right; align-items: right; color:red;">| x |</button>
    {{session()->get('message')}}
</div>
@endif

<div style="background-color:#1a0e01; color:white;">
    <h1 style="text-align:center; font-size:400%;">Our Pizzas</h1>
    <div style="display:grid; grid-template-columns:repeat(4,minmax(270px, 1fr))">
    @if(count($AllPizzas)>0)
    @foreach($AllPizzas as $key => $Pizza)
    <div style="border-style:solid; border-color:white; padding: 5px 5px 5px 5px; margin:5px 5px 5px 5px; text-align:center;  justify-content: center; align-items: center;">
    <h2 style="text-align:center;">{{$Pizza->name}}</h2>
    <p style="color:yellow;">A delicious thin crust pizza with {{$Pizza->description}} and creamy mozzarella cheese on top.</p>
    <p>Toppings:{{$Pizza->toppings}} and cheese.</p>
    <p>Price:£{{$Pizza->price_S}}(Small)|£{{$Pizza->price_M}}(Medium)|£{{$Pizza->price_L}}(Large)</p>
    <br>
    <img src="{{URL($Pizza->image)}}" alt="Pizza image" height="250" width="250" style="height: 250px; width: 250px;">
    <br>
    <a href="{{url('customizepizza',$Pizza->id)}}"><button style="border-style:solid; border-color:white; padding: 5px 5px 5px 5px; background-color:red;">Customize</button></a>
    </div>
    @endforeach
    @else
    <div>
    <p>Nothing to Show</p>
    </div>
    @endif
   </div>
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


