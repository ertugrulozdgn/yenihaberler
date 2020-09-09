<?php

use Illuminate\Support\Facades\Route;





Route::namespace('Backend')->group(function (){
    Route::prefix('admin1433')->group(function (){

        Route::get('/','DefaultController@login')->name('admin.login');
        Route::post('/','DefaultController@authenticate')->name('admin.authenticate');  //login.blade form action

    });

    Route::middleware(['user'])->group(function () {
        Route::prefix('admin1433')->group(function (){

            Route::get('/index','DefaultController@index')->name('admin.index');
            Route::get('/logout','DefaultController@logout')->name('admin.logout');
            Route::get('auth/posts','AuthPostsController@index');
            Route::resource('posts','PostsController');
            Route::get('/auth/profile','DefaultController@edit')->name('admin.profile');
            Route::post('/auth/profile','DefaultController@update')->name('admin.profile.edit');


            Route::middleware(['admin'])->group(function () {
                Route::resource('categories','CategoriesController');
                Route::resource('users','UsersController');
            });
        });
    });
});



Route::get('/','HomeController@index')->name('news.home');

Route::get('/{slug}-{id}','Frontend\DetailController@show')->where([
   'slug' => '[a-zA-Z-0-9-]+',
   'id' => '[0-9]+'
]);

Route::get('/search','HomeController@search')->name('news.search');

Route::get('/{slug}','HomeController@show')->name('news.category');












//Auth::routes();


