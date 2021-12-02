<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\Helpers;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/encryption', function () {
	$key = '12jg3454mbmigjmjjlfkkkjghgkkrfuito9';

	$cipher = "aes-256-cbc";

    $iv_size = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($iv_size);

    // $iv_encode = base64_encode($iv);
    // $iv_decode = base64_decode($iv_encode);

    // dd($iv_encode);

	$data = 'This is what the love of God means';

    $encrypted_data = encryption($key, $data, $cipher, $iv_size, $iv);
    // return $encrypted_data;

    return $decrypted_data = decryption($key, $encrypted_data, $cipher, $iv_size, $iv);
});

Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});


//Admin controller
Route::group(['middleware' => 'auth'], function(){
	Route::get('/', [App\Http\Controllers\Admin\HomePageController::class, 'index']);

	Route::get('/home', [App\Http\Controllers\Admin\HomePageController::class, 'home_dash']);

	Route::get('/candidate', [App\Http\Controllers\Admin\CandidateController::class, 'create'])->middleware('permission:All');

	Route::post('/candidate/store', [App\Http\Controllers\Admin\CandidateController::class, 'store'])->middleware('permission:All');

	Route::get('/candidate/list', [App\Http\Controllers\Admin\CandidateController::class, 'index'])->middleware('permission:All');

	Route::put('/candidate/call_result', [App\Http\Controllers\Admin\CandidateController::class, 'result'])->middleware('permission:All');

	Route::get('/candidate/edit/{id}', [App\Http\Controllers\Admin\CandidateController::class, 'edit'])->middleware('permission:All');

	Route::put('/candidate/edit/{id}', [App\Http\Controllers\Admin\CandidateController::class, 'update'])->name('candidate-update')->middleware('permission:All');

	Route::delete('/candidate/delete/{id}', [App\Http\Controllers\Admin\CandidateController::class, 'destroy'])->name('candidate-delete')->middleware('permission:All');


	Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->middleware('permission:All');

	Route::delete('/users/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user-delete')->middleware('permission:All');


	Route::get('/candidate/view_voters/{id}', [App\Http\Controllers\Admin\CandidateController::class, 'view'])->middleware('permission:All');

	Route::get('/party/create', [App\Http\Controllers\Admin\PartyController::class, 'create'])->middleware('permission:All');

	Route::post('/party/store', [App\Http\Controllers\Admin\PartyController::class, 'store'])->middleware('permission:All');

	Route::get('/party/list', [App\Http\Controllers\Admin\PartyController::class, 'index'])->middleware('permission:All');

	Route::get('/party/edit/{id}', [App\Http\Controllers\Admin\PartyController::class, 'edit'])->middleware('permission:All');

	Route::put('/party/edit/{id}', [App\Http\Controllers\Admin\PartyController::class, 'update'])->name('party-update')->middleware('permission:All');

	Route::delete('/party/delete/{id}', [App\Http\Controllers\Admin\PartyController::class, 'destroy'])->name('party-delete')->middleware('permission:All');

	Route::get('/ballot/list', [App\Http\Controllers\Admin\BallotPaperController::class, 'index'])->middleware('permission:All|user_permission');

	Route::get('/result', [App\Http\Controllers\Admin\BallotPaperController::class, 'view_result'])->middleware('permission:All|user_permission');

	// Route::get('/ballot/store/{id}', [App\Http\Controllers\Admin\BallotPaperController::class, 'store'])->name('ballot-check');

	Route::post('/ballot', [App\Http\Controllers\Admin\BallotPaperController::class, 'vote'])->middleware('permission:All|user_permission');

	Route::get('/permission/create', [App\Http\Controllers\Admin\PermissionController::class, 'create'])->middleware('permission:All');

	Route::post('/permission/store', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->middleware('permission:All');

	Route::get('/permission/list', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->middleware('permission:All');

	Route::get('/permission/edit/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('permission-edit')->middleware('permission:All');

	Route::put('/permission/update/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('permission-update')->middleware('permission:All');

	Route::delete('/permission/delete/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('permission-delete')->middleware('permission:All');


	Route::get('/roles/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->middleware('permission:All');

	Route::post('/roles/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->middleware('permission:All');

	Route::get('/roles/list', [App\Http\Controllers\Admin\RoleController::class, 'index'])->middleware('permission:All');

	Route::get('/roles/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('role-edit')->middleware('permission:All');

	Route::put('/roles/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('role-update')->middleware('permission:All');

	Route::delete('/roles/delete/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role-delete')->middleware('permission:All')->middleware('permission:All');
});


//Users/voters controller
Route::group(['middleware' => 'auth'], function(){
	Route::get('/users/register', [App\Http\Controllers\Voters\HomePageController::class, 'edit'])->middleware('permission:All|user_permission');

	Route::match(['get', 'post','put'],'/users/register/{id}', [App\Http\Controllers\Voters\HomePageController::class, 'update'])->name('update-user')->middleware('permission:All|user_permission');

	Route::get('/findLocalName', [App\Http\Controllers\Voters\HomePageController::class, 'findLocalName']);


	Route::match(['get','post'], '/profile', [App\Http\Controllers\Profile\ProfileController::class, 'index'])->middleware('permission:All|user_permission');

	Route::get('/decrypt/edit/{id}', [App\Http\Controllers\Profile\ProfileController::class, 'edit'])->middleware('permission:All|user_permission');

	// Route::post('/profile', [App\Http\Controllers\Profile\ProfileController::class, 'index']);

	Route::get('/users/vote', [App\Http\Controllers\Voters\VotersController::class, 'create']);
	
	Route::post('/voting/request', [App\Http\Controllers\Voters\VotersController::class, 'vote_request'])->middleware('permission:All|user_permission');


});


Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


