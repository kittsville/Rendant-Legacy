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
