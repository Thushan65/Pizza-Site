<?php
use App\Models\Pizzas;
use App\Models\toppings;
use App\Http\Controllers\PizzasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $AllPizzas = Pizzas::get();
    $Alltoppings = toppings::get();
    return view('welcome',compact('AllPizzas','Alltoppings'));
    //return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('pizzas', PizzasController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']); 

Route::prefix('image')->group(function () {
    Route::get('images/{filename}','ImageController@showImage')
    ->name('jobImage');
});

Route::Get('/customizepizza/{id}',[PizzasController::class,'edit']);

Route::post('/addcart/{id}',[PizzasController::class,'addcart']);

Route::Get('/pizzas/showcart',[PizzasController::class,'show']);

Route::Get('/delete/{id}',[PizzasController::class,'delete']);

Route::post('/order',[PizzasController::class,'store']);

Route::Get('/pizzas/viewpast',[PizzasController::class,'create']);

Route::post('/orderagain',[PizzasController::class,'update']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
