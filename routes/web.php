<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/hello', function () {
    return 'hello world!';
});

Route::get('/json', function () {
    return ['foo' => 'bar'];
});

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if(!file_exists($path)){
        //dd('file does not exist');
        //ddd('file does not exist');
        //abort(404);
        return redirect('/posts');
    }

    return view('post',[
        'post' => file_get_contents($path)
    ]);
})->where('post', '[A-z_\-]+');