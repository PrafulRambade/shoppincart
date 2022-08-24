<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

Route::get('/dashboard',[AdminController::class,'dashboard']);
Route::get('/products',[AdminController::class,'productsList']);
Route::get('/addproduct',[CategoryController::class,'addProduct']);

Route::get('/addcategory',[CategoryController::class,'addCategory']);
Route::post('/savecategory',[CategoryController::class,'saveCategory']);
Route::get('/categories',[CategoryController::class,'CategoriesList']);
Route::get('/edit_category/{id}',[CategoryController::class,'categoryEdit']);
Route::post('updatecategory',[CategoryController::class,'updatecategory']);
Route::get('/delete_category/{id}',[CategoryController::class,'categoryDelete']);


Route::get('/',[ClientController::class,'index']);
Route::get('/shop',[ClientController::class,'shop']);
Route::get('/wishlist',[ClientController::class,'wishlist']);
Route::get('/single-product',[ClientController::class,'single_product']);
Route::get('/cart',[ClientController::class,'cart']);
Route::get('/checkout',[ClientController::class,'checkout']);
Route::get('/about',[ClientController::class,'about']);
Route::get('/blog',[ClientController::class,'blog']);
Route::get('/blog-single',[ClientController::class,'blog_single']);
Route::get('/contact',[ClientController::class,'contact']);