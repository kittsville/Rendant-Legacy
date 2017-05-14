<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Redirects naked URL to current API version
$app->get('', function() use ($app) {
    return redirect()->route('root');
});

$app->group(['prefix' => '/v1'], function () use ($app) {
    $app->get('', ['uses' => 'ApiController@viewRoutes', 'as' => 'root']);
});

// Routes for creating/viewing Results
$app->group(['prefix' => '/v1/results'], function () use ($app) {
    $app->get('',               'PlaceholderController@viewResults');
    $app->post('new',           'PlaceholderController@newResult');
    $app->get('{result_id}',    'PlaceholderController@viewResult');
    $app->delete('{result_id}', 'PlaceholderController@deleteResult');
});
