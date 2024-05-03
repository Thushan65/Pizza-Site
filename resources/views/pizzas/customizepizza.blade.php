<x-app-layout>
<h1>Let's Make your pizza</h1>
<h2>{{$data->name}}</h2>
<p>Price:£{{$data->price_S}}(Small)|£{{$data->price_M}}(Medium)|£{{$data->price_L}}(Large)</p>
<img src="{{URL($data->image)}}" alt="Pizza image">

<form action="{{url('addcart',$data->id)}}" method="POST">
    @csrf 
    <label for="topping_1">Topping 1:</label>
    <select name="topping_1" id="topping_1">
        <option value="{{$data->topping_1}}" selected>{{$data->topping_1}}</option>
        @foreach($data2 as $row)
        <option value="{{$row->name}}">{{$row->name}}</option>
        @endforeach
    </select>
    <label for="topping_2">Topping 2:</label>
    <select name="topping_2" id="topping_2">
        <option value="{{$data->topping_2}}" selected>{{$data->topping_2}}</option>
        @foreach($data2 as $row)
        <option value="{{$row->name}}">{{$row->name}}</option>
        @endforeach
    </select>
    <label for="topping_3">Topping 3:</label>
    <select name="topping_3" id="topping_3">
        <option value="{{$data->topping_3}}" selected>{{$data->topping_3}}</option>
        @foreach($data2 as $row)
        <option value="{{$row->name}}">{{$row->name}}</option>
        @endforeach
    </select>
    <label for="size">Size:</label>
    <select name="size" id="size">
        <option value="Small">Small</option>
        <option value="Medium">Medium</option>
        <option value="Large" selected>Large</option>
    </select>
    <label for="quantity" id="quantity">Quantity:</label>
    <input type="number" value="1" min="1" name="quantity">
    <br>

    <script>
        document.getElementById('size').addEventListener('change', function() {
            var size = this.value;
            var priceInput = document.getElementById('price');
            if (size === 'Small') {
                priceInput.value = '{{$data->price_S}}';
            } else if (size === 'Medium') {
                priceInput.value = '{{$data->price_M}}';
            } else if (size === 'Large') {
                priceInput.value = '{{$data->price_L}}';
            }
        });
    </script>

    <br>
    <label for="extra_topping">Extra Topping:</label>
        @foreach($data2 as $row)
        <input type="checkbox" name="{{$row->name}}" value="{{$row->name}}" id="{{$row->name}}" class="topping-checkbox">
        <label for="{{$row->name}}">{{$row->name}}</label>
        @endforeach

    <script>
        // Get all topping checkboxes
        const toppingCheckboxes = document.querySelectorAll('.topping-checkbox');

        // Add event listener to each checkbox
        toppingCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Get the current price value
                let priceInput = document.getElementById('price');
                let currentPrice = parseFloat(priceInput.value);

                // If checkbox is checked, add 85 to the price; otherwise, subtract 85
                if (this.checked) {
                    currentPrice += 0.85;
                } else {
                    currentPrice -= 0.85;
                }

                // Update the price input value
                priceInput.value = currentPrice.toFixed(2); // Update price with 2 decimal places
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.topping-checkbox').change(function(){
                var selectedToppings = [];
                $('.topping-checkbox:checked').each(function(){
                    selectedToppings.push($(this).val());
                });
                $('#show_toppings').val(selectedToppings.join(', '));
            });
        });
    </script>

    <input type="hidden" name="show_toppings" id="show_toppings">

    <label for="price">Price:</label>
    <input type="number" value="{{$data->price_L}}" name="price" id="price" readonly>
    <br>
    <button type="submit">Add to Order</button>
</form>

<div>
            <h1>Let's see the extra toppings</h1>
                <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                    @if(count($data2)>0)
                    @foreach($data2 as $key => $toppings)
                    <h2>{{$toppings->name}}</h2>
                    <p>Price: {{$toppings->price}}p</p>
                    <img src="{{URL($toppings->image)}}" alt="Toppings image">
                    @endforeach
                    @else
                    <p>Nothing to Show</p>
                    @endif
                </div>
        </div>
</x-app-layout>