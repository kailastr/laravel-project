<?php

use Illuminate\Support\Facades\Route;

//basic route
Route::get('/', function () {
    return view('welcome');
});

//route parameters
Route::get('/about/{userName}/{age}', function($userName, $age) {
    // return view('about',['userName' => $userName, 'userAge' => $age]);
    return view('about', compact('userName', 'age'));
});

//named routes
Route::get('/contact', function(){
    return view('contact');
}) -> name('contact_name');

//resoursefull route
Route::resource('articles', 'ArticleController');

Route::get('/articles', [ArticleController::class, 'index']) -> name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create']) -> name('articles.create');
Route::post('/articles/store', [ArticleController::class, 'store']) -> name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show']) -> name('articles.show');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']) -> name('articles.edit');
Route::patch('/articles/{article}', [ArticleController::class, 'update']);
Route::delete('/articles/{article}', [ArticleController::class, 'destroy']) -> name('articles.destroy');