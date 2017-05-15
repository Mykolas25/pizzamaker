<?php

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

/**
 * Routes for admin role only
 */
Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'cheeses'], function () {

        Route::get('/', ['as' => 'app.cheeses.index','uses' => 'DTCheesesController@index']);

        Route::get('/create', ['as' => 'app.cheeses.create','uses' => 'DTCheesesController@create']);
        Route::post('/create', [ 'uses' => 'DTCheesesController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.cheeses.edit', 'uses' => 'DTCheesesController@edit']);
            Route::post('/edit', ['uses' => 'DTCheesesController@update']);

            Route::get('/', ['uses' => 'DTCheesesController@show']);
            Route::delete('/', ['as' => 'app.cheeses.delete', 'uses' => 'DTCheesesController@destroy']);

        });
    });

    Route::group(['prefix' => 'ingredients'], function () {

        Route::get('/', ['as' => 'app.ingredients.index','uses' => 'DTIngredientsController@index']);

        Route::get('/create', ['as' => 'app.ingredients.create','uses' => 'DTIngredientsController@create']);
        Route::post('/create', [ 'uses' => 'DTIngredientsController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.ingredients.edit', 'uses' => 'DTIngredientsController@edit']);
            Route::post('/edit', ['uses' => 'DTIngredientsController@update']);

            Route::get('/', ['as' => 'app.ingredients.show', 'uses' => 'DTIngredientsController@adminShow']);
            Route::delete('/', ['as' => 'app.ingredients.show', 'uses' => 'DTIngredientsController@destroy']);

        });
    });

    Route::group(['prefix' => 'pads'], function () {

        Route::get('/', ['as' => 'app.pads.index','uses' => 'DTPadsController@index']);

        Route::get('/create', ['as' => 'app.pads.create','uses' => 'DTPadsController@create']);
        Route::post('/create', [ 'uses' => 'DTPadsController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.pads.edit', 'uses' => 'DTPadsController@edit']);
            Route::post('/edit', ['uses' => 'DTPadsController@update']);

            Route::get('/', ['uses' => 'DTPadsController@show']);
            Route::delete('/', ['as' => 'app.pads.delete', 'uses' => 'DTPadsController@destroy']);

        });
    });

    Route::group(['prefix' => 'permissions'], function () {

        Route::get('/', ['as' => 'app.permissions.index','uses' => 'DTPermissionsController@index']);

        Route::get('/create', ['as' => 'app.permissions.create','uses' => 'DTPermissionsController@create']);
        Route::post('/create', [ 'uses' => 'DTPermissionsController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.permissions.edit', 'uses' => 'DTPermissionsController@edit']);
            Route::post('/edit', ['uses' => 'DTPermissionsController@update']);

            Route::get('/', ['uses' => 'DTPermissionsController@show']);
            Route::delete('/', ['as' => 'app.permissions.delete', 'uses' => 'DTPermissionsController@destroy']);

        });
    });

    Route::group(['prefix' => 'pizzas'], function () {

        Route::get('/', ['as' => 'app.pizzas.index','uses' => 'DTPizzasController@index']);

        Route::get('/create', ['as' => 'app.pizzas.create','uses' => 'DTPizzasController@create']);
        Route::post('/create', [ 'uses' => 'DTPizzasController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.pizzas.edit', 'uses' => 'DTPizzasController@edit']);
            Route::post('/edit', ['uses' => 'DTPizzasController@update']);

            Route::get('/', ['uses' => 'DTPizzasController@show']);
            Route::delete('/', ['as' => 'app.pizzas.delete', 'uses' => 'DTPizzasController@destroy']);

        });
    });

    Route::group(['prefix' => 'roles'], function () {

        Route::get('/', ['as' => 'app.roles.index','uses' => 'DTRolesController@index']);

        Route::get('/create', ['as' => 'app.roles.create','uses' => 'DTRolesController@create']);
        Route::post('/create', [ 'uses' => 'DTRolesController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.roles.edit', 'uses' => 'DTRolesController@edit']);
            Route::post('/edit', ['uses' => 'DTRolesController@update']);

            Route::get('/', ['uses' => 'DTRolesController@show']);
            Route::delete('/', ['as' => 'app.roles.delete', 'uses' => 'DTRolesController@destroy']);

        });
    });

    Route::group(['prefix' => 'users'], function () {

        Route::get('/', ['as' => 'app.users.index','uses' => 'DTUsersController@index']);

        Route::get('/create', ['as' => 'app.users.create','uses' => 'DTUsersController@create']);
        Route::post('/create', [ 'uses' => 'DTUsersController@store']);

        Route::group(['prefix' => '{id}'], function () {

            Route::get('/edit', ['as' => 'app.users.edit', 'uses' => 'DTUsersController@edit']);
            Route::post('/edit', ['uses' => 'DTUsersController@update']);

            Route::get('/', ['uses' => 'DTUsersController@show']);
            Route::delete('/', ['as' => 'app.users.delete', 'uses' => 'DTUsersController@destroy']);

        });
    });

});


Route::group(['prefix' => 'pizzas'], function () {

    Route::get('/', ['as' => 'front-end.pizzas.index','uses' => 'DTPizzasController@index']);

    Route::get('/create', ['as' => 'front-end.pizzas.create','uses' => 'DTPizzasController@create']);
    Route::post('/create', [ 'uses' => 'DTPizzasController@store']);

    Route::group(['prefix' => '{id}'], function () {

        Route::get('/edit', ['as' => 'front-end.pizzas.edit', 'uses' => 'DTPizzasController@edit']);
        Route::post('/edit', ['uses' => 'DTPizzasController@update']);

        Route::get('/', ['uses' => 'DTPizzasController@show']);
        Route::delete('/', ['as' => 'front-end.pizzas.delete', 'uses' => 'DTPizzasController@destroy']);

    });
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/', ['as' => 'app.register.show','uses' => 'Auth\RegisterController@showRegistrationForm']);
//    Route::post('/create', [ 'uses' => '@create']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
