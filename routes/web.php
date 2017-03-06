
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

Auth::routes();

Route::get('/home', 'EventController@index');

Route::group(['middleware'=>'auth'], function(){

	Route::resource('event', 'EventController');
	Route::resource('availability', 'AvailabilityController');
	Route::get('event/{id}/activate', 'EventActivationController@activate')->name('event.activate');
	Route::get('event/{id}/deactivate', 'EventActivationController@deactivate')->name('event.deactivate');

	Route::get('{user}/{event}', 'EventUrlController@show');//->where('user', '[a-z0-9](-?[a-z0-9]*)')->where('event', '[a-z0-9](-?[a-z0-9]*)');
	// Route::get('{user}/{event}', function (App\User $user App\Event $event) {
	//     return redirect()->route('event.id');
	// });
});