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
        Route::get('add-kelas','Api\General\ParameterController@add_kelas');
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
        Route::get('profile','Api\Sekolah\SekolahController@profile');
        Route::post('update-profile','Api\Sekolah\SekolahController@update_profile');
    });
});


Route::group([
    'prefix' => 'guru'
], function () {
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('grid','Api\Sekolah\GuruController@grid');
        Route::post('save','Api\Sekolah\GuruController@save');
        Route::get('by-id/{id}','Api\Sekolah\GuruController@by_id');
        Route::post('update','Api\Sekolah\GuruController@update');
    });
});


Route::group([
    'prefix' => 'jurusan'
], function () {
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('grid','Api\Sekolah\JurusanController@grid');
        Route::post('save','Api\Sekolah\JurusanController@save');
        Route::get('delete/{id}','Api\Sekolah\JurusanController@delete');
    });
});

Route::group([
    'prefix' => 'sub-kelas'
], function () {
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('grid','Api\Sekolah\SubKelasController@grid');
        Route::post('save','Api\Sekolah\SubKelasController@save');
        Route::get('edit/{id}','Api\Sekolah\SubKelasController@edit');
        Route::post('update','Api\Sekolah\SubKelasController@update');
    });
});

Route::group([
    'prefix' => 'wali-kelas'
], function () {
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('grid','Api\WaliKelas\WaliKelasController@grid');
    });
});