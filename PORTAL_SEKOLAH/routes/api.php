<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//  Route::get('list', 'Api\SekolahController@index');
// Route::post('register', 'Api\AuthController@register_user');


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('user/register','Api\AuthController@register_user');
    Route::post('ppdb/register','Api\AuthController@register_ppdb');
    Route::post('login','Api\AuthController@login');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('me','Api\AuthController@current_user');
        Route::get('list','Api\AuthController@list');
        Route::get('logout','Api\AuthController@logout');
    });
});

Route::group([
    'prefix' => 'ppdb'
], function () {
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('list','Api\PPDB\PPDBController@list_sekolah');
        Route::post('data-diri-save','Api\PPDB\PPDBController@data_diri_save');
        Route::post('data-keluarga-save','Api\PPDB\PPDBController@data_keluarga_save');
        Route::post('asal-sekolah-save','Api\PPDB\PPDBController@asal_sekolah_save');
        Route::post('resume-save','Api\PPDB\PPDBController@resume_save');
        Route::get('initial-parameter','Api\PPDB\PPDBController@initial_parameter');
        Route::get('info-user','Api\PPDB\PPDBController@current_data');
    });
});

Route::group([
    'prefix' => 'param'
], function () {
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('status-sekolah','Api\General\ParameterController@status_sekolah');
    });
});

Route::group([
    'prefix' => 'sekolah'
], function () {
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::post('register','Api\Sekolah\RegistrasiSekolahController@register');
        Route::get('grid','Api\Sekolah\RegistrasiSekolahController@grid');
        Route::get('by-id/{id}','Api\Sekolah\RegistrasiSekolahController@byId');
        Route::post('update','Api\Sekolah\RegistrasiSekolahController@update');
    });
});