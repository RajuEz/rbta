<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Author
$router->group(['prefix' => 'author'], function ($router) {
    $router->post('/', 'AuthorController@create');
});

//Article
$router->group(['prefix' => 'article'], function ($router) {
    $router->get('/', 'ArticleController@index');
    $router->post('/', 'ArticleController@create');

    $router->group(['prefix' => '{article}'], function ($router) {
        $router->get('/', 'ArticleController@show');
        $router->patch('/', 'ArticleController@update');
        $router->delete('/', 'ArticleController@delete');
    });
});
