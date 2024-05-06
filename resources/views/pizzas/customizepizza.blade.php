<x-app-layout>
<div style="background-color:#1a0e01; color:white;">
<h1 style="font-size:300%; text-align:center;">Let's Make your pizza</h1>
    <div style="display:grid; grid-template-columns:repeat(2,minmax(270px, 1fr))">
        <div style="border-style: solid; border-color: wtite; padding: 5px 5px 5px 5px; margin:5px 5px 5px 5px; text-align:center;  justify-content: center; align-items: center;">
            <h2 style="font-size:200%;">{{$data->name}}</h2>
            <p style="font-size:100%;">Price:£{{$data->price_S}}(Small)|£{{$data->price_M}}(Medium)|£{{$data->price_L}}(Large)</p>
            <img src="{{URL($data->image)}}" alt="Pizza image" height="500" width="500" style="text-align:center;  justify-content: center; align-items: center;">
        </div>

        <div style="border-style: solid; border-color: wtite; padding: 5px 5px 5px 5px; margin:5px 5px 5px 5px; text-align:center;  justify-content: center; align-items: center;">
            <form action="{{url('addcart',$data->id)}}" method="POST">
                @csrf 
                <label for="topping_1">Topping 1:</label>
                <select name="topping_1" id="topping_1" style="color:black;">
                    <option value="{{$data->toppings_1}}" selected>{{$data->toppings_1}}</option>
                    @foreach($data2 as $row)
                    <option value="{{$row->name}}">{{$row->name}}</option>
                    @endforeach
                </select>
                <br><br>
                <label for="topping_2">Topping 2:</label>
                <select name="topping_2" id="topping_2" style="color:black;">
                    <option value="{{$data->toppings_2}}" selected>{{$data->toppings_2}}</option>
                    @foreach($data2 as $row)
                    <option value="{{$row->name}}">{{$row->name}}</option>
                    @endforeach
                </select>
                <br><br>
                <label for="topping_3">Topping 3:</label>
                <select name="topping_3" id="topping_3" style="color:black;">
                    <option value="{{$data->toppings_3}}" selected>{{$data->toppings_3}}</option>
                    @foreach($data2 as $row)
                    <option value="{{$row->name}}">{{$row->name}}</option>
                    @endforeach
                </select>
                <br><br>
                <label for="size">Size:</label>
                <select name="size" id="size" style="color:black;">
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large" selected>Large</option>
                </select>
                <label for="quantity">Quantity:</label>
                <input type="number" value="1" min="1" name="quantity" style="color:black;" id="quantity">
                <br><br>


                        <script>
                            function updatePrice() {
                                var size = document.getElementById('size').value;
                                var quantity = parseInt(document.getElementsByName('quantity')[0].value);
                                var priceInput = document.getElementById('price');
                                
                                var price;
                                if (size === 'Small') {
                                    price = {{$data->price_S}};
                                } else if (size === 'Medium') {
                                    price = {{$data->price_M}};
                                } else if (size === 'Large') {
                                    price = {{$data->price_L}};
                                }
                                
                                if (!isNaN(quantity)) {
                                    price *= quantity;
                                }
                                
                                priceInput.value = price.toFixed(2); // Ensure the price is formatted to two decimal places
                            }

                            // Listen for changes in both size and quantity inputs
                            document.getElementById('size').addEventListener('change', updatePrice);
                            document.getElementsByName('quantity')[0].addEventListener('input', updatePrice);
                            
                            // Initialize price calculation on page load
                            updatePrice();
                        </script>



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

                                    let quantityInput = document.getElementById('quantity');
                                    let currentQuantity = parseFloat(quantityInput.value);

                                    // If checkbox is checked, add 85 to the price; otherwise, subtract 85
                                    if (this.checked) {
                                        currentPrice += 0.85*currentQuantity;
                                    } else {
                                        currentPrice -= 0.85*currentQuantity;
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
                <br><br>
                <label for="price">Price:</label>
                <input type="number" value="{{$data->price_L}}" name="price" id="price" readonly style="color:black;">
                <br><br>
                <button type="submit" style="background-color:red;">Add to Order</button>
            </form>
        </div>
    </div>

    <hr>

    <div>
    <h1 Style="font-size:300%; text-align:center;">Let's see the extra toppings</h1>
    
        <div style="display:grid; grid-template-columns:repeat(4,minmax(270px, 1fr))">
                    @if(count($data2)>0)
                    @foreach($data2 as $key => $toppings)
                    <div style="border-style: solid; border-color: wtite; padding: 5px 5px 5px 5px; margin:5px 5px 5px 5px; text-align:center;  justify-content: center; align-items: center;">
                    <h2>{{$toppings->name}}</h2>
                    <p>Price: {{$toppings->price}}p</p>
                    <img src="{{URL($toppings->image)}}" alt="Toppings image" height="250" width="250" style="height: 250px; width: 250px;">
                    </div>
                    @endforeach
                    @else
                    <div>
                    <p>Nothing to Show</p>
                    </div>
                    @endif
                
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