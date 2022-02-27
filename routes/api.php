<?php

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/movies-all', function () {
    return Movie::all();
});

Route::post('search', 'SearchController@index');

Route::middleware('auth:api')->group(function () {

    Route::get('/movies', 'MoviesController@index');
    Route::post('/movies', 'MoviesController@store');
    Route::get('/movies/{movie}', 'MoviesController@show');
    Route::patch('/movies/{movie}', 'MoviesController@update');
    Route::delete('/movies/{movie}', 'MoviesController@destroy');
 
});


