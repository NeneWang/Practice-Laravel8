<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use GuzzleHttp\Middleware;

// use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    echo "This is Home Page";
});

Route::get('/about', function () {
    // return view('welcome');
   return view('about');
})->Middleware('age');

Route::get('/contact', [ContactController::class, 'index']);


