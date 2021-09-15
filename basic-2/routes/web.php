<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CateogryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
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
    $brands = DB::table('brands')->get();
    return view('home', compact('brands', 'abouts'));
});

Route::get('/home', function () {
    
    $abouts = DB::table('home_abouts')->get();
    return view('home');
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


// For Brand Route
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('brand/delete/{id}', [BrandController::class, "Delete"]);

// Multi Image Route
Route::get('multi/image/all', [BrandController::class, 'Multpic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

// Admin ALL Route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();
    // $users = DB::table('users')->get();
    // return view('dashboard', compact('users'));

    return view('admin.index');
})->name('dashboard');
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

// Home About All Route

Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);