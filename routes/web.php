<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
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
    return view('posts', [
        'posts' => Post::latest()->with(['category', 'author'])->get()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) { // Post::where('slug', $post)->firstOrFail()
     return view('post', [
        'post' => $post
    ]);
});

Route::get('/posts/categories/{category:slug}', function (Category $category) {
    return view('posts', [
       'posts' => $category->posts
   ]);
});

Route::get('/posts/authors/{author:username}', function (User $author) {
    return view('posts', [
       'posts' => $author->posts
   ]);
});
