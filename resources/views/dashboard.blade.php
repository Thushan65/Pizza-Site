<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div style="background-color:#1a0e01; color:white;">
        <div style="display:grid; grid-template-columns:repeat(3,minmax(270px, 1fr))">
            <div style="border-style: solid; border-color: wtite; padding: 5px 5px 5px 5px; margin:5px 5px 5px 5px; text-align:center;  justify-content: center; align-items: center;">
            <a href="/pizzas">
                <h1 style="font-size: 200%; color:white; text-align: center;">Let's Order</h1>
                <img src="{{URL('images/order.jpg')}}" alt="Image" height="400" width="400">
            </a>
            </div>
            <div style="border-style: solid; border-color: wtite; padding: 5px 5px 5px 5px; margin:5px 5px 5px 5px; text-align:center;  justify-content: center; align-items: center;">
            <a href="'/pizzas/viewpast'">
                <h1 style="font-size: 200%; color:white; text-align: center;">Past Orders</h1>
                <img src="{{URL('images/past.jpg')}}" alt="Image" height="400" width="400">
            </a>
            </div>
            <div style="border-style: solid; border-color: wtite; padding: 5px 5px 5px 5px; margin:5px 5px 5px 5px; text-align:center;  justify-content: center; align-items: center;">
            <a href="'/pizzas/showpast'">
                <h1 style="font-size: 200%; color:white; text-align: center;">View Cart</h1>
                <img src="{{URL('images/cart.jpg')}}" alt="Image" height="400" width="400">
            </a>
            </div>
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
