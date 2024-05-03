<x-app-layout>
@if(session()->has('message'))
<div>
    <button type="button" data-dismiss="alert">x</button>
    {{session()->get('message')}}
</div>
@endif


    <h1>Our Pizzas</h1>
   <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    @if(count($AllPizzas)>0)
    @foreach($AllPizzas as $key => $Pizza)
    <h2>{{$Pizza->name}}</h2>
    <p>A delicious thin crust pizza with {{$Pizza->description}} and creamy mozzarella cheese on top.</p>
    <p>Toppings:{{$Pizza->toppings}} and cheese.</p>
    <p>Price:£{{$Pizza->price_S}}(Small)|£{{$Pizza->price_M}}(Medium)|£{{$Pizza->price_L}}(Large)</p>
    <img src="{{URL($Pizza->image)}}" alt="Pizza image">
    <a href="{{url('customizepizza',$Pizza->id)}}"><button>Customize</button></a>
    @endforeach
    @else
    <p>Nothing to Show</p>
    @endif
   </div>
</x-app-layout>


