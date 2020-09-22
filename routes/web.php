<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;


Route::get('/', function() {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

Route::get('/login', 'auth\AuthController@index')->name('login');
Route::post('/login', 'auth\AuthController@login');
Route::get('/logout', 'auth\AuthController@logout');

// Dashboard
Route::get('/home', 'home\HomeController@index')->name('home');

// Users
Route::get('/users/create', 'user\UsersController@create');
Route::post('/users/store', 'user\UsersController@store');
Route::get('/users', 'user\UsersController@index');
Route::get('/users/delete/{id}' , 'user\UsersController@delete');
Route::get('/users/{id}', 'user\UsersController@details');
Route::get('/users/edit/{id}', 'user\UsersController@edit');
Route::post('/users/update/{id}', 'user\UsersController@update');

// Categories
Route::get('/categories', 'products\CategoryController@index');
Route::get('/categories/delete/{id}', 'products\CategoryController@delete');
Route::get('/categories/create', 'products\CategoryController@create');
Route::post('/categories/store', 'products\CategoryController@store');
Route::get('/categories/edit/{id}', 'products\CategoryController@edit');
Route::post('/categories/update/{id}', 'products\CategoryController@update');


// Suppliers
Route::get('/suppliers', 'products\SupplierController@index');
Route::get('/suppliers/create', 'products\SupplierController@create');
Route::post('/suppliers/store', 'products\SupplierController@store');
Route::get('/suppliers/edit/{id}', 'products\SupplierController@edit');
Route::get('/suppliers/{id}', 'products\SupplierController@details');
Route::post('/suppliers/update/{id}', 'products\SupplierController@update');
Route::get('/suppliers/delete/{id}', 'products\SupplierController@delete');

// Products
Route::get('/products/delete/{id}', 'products\ProductController@delete');
Route::get('/products', 'products\ProductController@index');
Route::get('/products/create', 'products\ProductController@create');
Route::post('/products/store', 'products\ProductController@store');
Route::get('/products/edit/{id}', 'products\ProductController@edit');
Route::get('/products/{id}', 'products\ProductController@details');
Route::post('/products/update/{id}', 'products\ProductController@update');

// Orders
Route::get('/orders', 'OrderController@index');
Route::get('/orders/create', 'OrderController@create');
Route::post('/orders/create', 'OrderController@store');
Route::get('orders/getCartProducts', 'OrderController@getCartProducts');
Route::post('/orders/addProductToCart', 'OrderController@addItemToOrder');
Route::get('/orders/removeProductFromCart/{productId}', 'OrderController@removeItemFromOrder');
Route::get('/orders/{productId}/changeProductQuantity/{quantity}', 'OrderController@changeProductQuantity');
Route::get('/orders/cancel', 'OrderController@cancelOrder');
Route::get('/orders/delete/{id}', 'OrderController@delete');


// Customers 
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/delete/{id}', 'CustomerController@delete');
Route::get('/customers/create', 'CustomerController@create');
Route::post('customers/store', 'CustomerController@store');
Route::get('/customers/edit/{id}', 'CustomerController@edit');
Route::post('/customers/update/{id}', 'CustomerController@update');
Route::get('/customers/{id}', 'CustomerController@details');


// Storage Routes
Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('app/profilePictures/' . $filename);
    if (!File::exists($path)) {
        $path = storage_path('app/profilePictures/default_profile.webp');
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});
