<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Pizza Shop</title>
    </head>

    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div>
            <img src="{{URL('images/pizzahead.jpg')}}" alt="Pizza image">
            <h1>The Pizzeria</h1>
            <p>"At Culinary Covenants Pizzeria, we're dedicated to the art of pizza making, where each slice is a canvas for culinary creativity. With a commitment to excellence ingrained in every step, from handcrafted dough to premium toppings, we strive to craft unforgettable flavors that linger on your palate and in your memories. Step into our welcoming ambiance, where tradition meets innovation, and embark on a flavorful journey with us, savoring each moment slice by slice."</p>

        </div>

        <div>
            <h1>Our Pizzas</h1>
                <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                    @if(count($AllPizzas)>0)
                    @foreach($AllPizzas as $key => $Pizza)
                    <h2>{{$Pizza->name}}</h2>
                    <p>A delicious thin crust pizza with {{$Pizza->description}} and creamy mozzarella cheese on top.</p>
                    <p>Toppings:{{$Pizza->toppings}} and cheese.</p>
                    <p>Price:£{{$Pizza->price_S}}(Small)|£{{$Pizza->price_M}}(Medium)|£{{$Pizza->price_L}}(Large)</p>
                    <img src="{{URL($Pizza->image)}}" alt="Pizza image">
                    <br>
                    <a href="{{route('login') }}"><button>Login to Buy</button></a>
                    @endforeach
                    @else
                    <p>Nothing to Show</p>
                    @endif
                </div>
        </div>

        <div>
            <h1>Our Toppings</h1>
                <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                    @if(count($Alltoppings)>0)
                    @foreach($Alltoppings as $key => $toppings)
                    <h2>{{$toppings->name}}</h2>
                    <p>Price: {{$toppings->price}}p</p>
                    <img src="{{URL($toppings->image)}}" alt="Toppings image">
                    @endforeach
                    @else
                    <p>Nothing to Show</p>
                    @endif
                </div>
        </div>
    </body>
</html>
