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


Route::get('/', 'Frontend\HomepageController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Fronted

Route::resource('reservations', 'Frontend\Reservation\ReservationsController');

// Backend

Route::group( ['prefix' => 'admin', 'middleware' => ['auth','admin'], ], function(){

    Route::get('index', 'AdminController@admin')
    ->name('admin');

    Route::resource('types', 'Backend\Type\TypesController');
    // ->except('create','store', 'destroy')
    Route::resource('courses', 'Backend\Course\CourseController');
    Route::resource('settings', 'Backend\Setting\SettingsController');
    Route::resource('inclusions', 'Backend\Inclusion\InclusionsController');
    Route::resource('features', 'Backend\Feature\FeaturesController')->except(['show']);
    Route::resource('services', 'Backend\Service\ServicesController');
    Route::resource('reservation', 'Backend\Reservation\ReservationsController');

    Route::get('contract/{reservation}', 'Backend\Reservation\ReservationsController@streamPDF')->name('reservation.pdf');

    

});
