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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([ 'prefix' => 'v0'], function (){
        Route::get('statuses/enroute', 'API\StatusController@enroute');
    Route::group(['middleware' => ['guest:api']], function () {
             Route::post('login', 'API\AuthController@login');
       Route::group(['prefix' => 'auth'], function () {
            Route::post('login', 'API\AuthController@login');
            Route::post('signup', 'API\AuthController@signup');
            Route::get('logout', 'API\AuthController@logout')->middleware('guest:api');
        });
    });
    // All protected routes
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('getuser', 'API\AuthController@getUser');

        // Controller for complete /statuses-stuff
        Route::resource('statuses', 'API\StatusController');

        // Controller for complete Train-Transport-Stuff
        Route::group(['prefix' => 'trains'], function() {
            Route::get('autocomplete/{station}', 'API\TransportController@TrainAutocomplete');
            Route::get('stationboard', 'API\TransportController@TrainStationboard');
            Route::get('trip', 'API\TransportController@TrainTrip');
            Route::post('checkin', 'API\TransportController@TrainCheckin');
            Route::get('latest', 'API\TransportController@TrainLatestArrivals');
            Route::get('home', 'API\TransportController@getHome');
            Route::put('home', 'API\TransportController@setHome');
        });
    });
});
