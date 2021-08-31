<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CateogryController;
use Illuminate\Support\Facades\DB;

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

Route::get('/contact', [ContactController::class, 'index'])->name('con');
Route::get('/category/all', [CateogryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CateogryController::class, 'AddCat'])->name('store.category');


Route::get('/category/edit/{id}', [CateogryController::class, 'Edit']);
Route::post('/category/update/{id}', [CateogryController::class, 'Update']);

Route::get('/softdelete/category/{id}', [CateogryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CateogryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CateogryController::class, 'Pdelete']);


Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');



