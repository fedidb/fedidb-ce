<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'site.landing');

Route::get('.well-known/webfinger', 'WebfingerController@webfinger');

Route::post('/s/request-bin', 'BinController@create');

Route::get('/rb/{bin}/log/{id}/debug.json', 'BinLogController@viewDebugJson');
Route::get('/rb/{bin}/log/{id}/actor.json', 'BinLogController@viewActorJson');
Route::get('/rb/{bin}/log/{id}/headers.json', 'BinLogController@viewHeadersJson');
Route::get('/rb/{bin}/log/{id}/object.json', 'BinLogController@viewObjectJson');
Route::get('/rb/{bin}/log/{id}/debug', 'BinLogController@viewDebug');
Route::get('/rb/{bin}/log/{id}/actor', 'BinLogController@viewActor');
Route::get('/rb/{bin}/log/{id}/headers', 'BinLogController@viewHeaders');
Route::get('/rb/{bin}/log/{id}/object', 'BinLogController@viewObject');
Route::get('/rb/{bin}/log/{id}', 'BinLogController@view');
Route::get('/rb/{id}', 'BinController@view');

Route::get('/actor/{id}/outbox', 'BinController@actorOutbox');
Route::get('/actor/{id}/content/post_with_attachment.json', 'BinController@postAttachmentObject');
Route::get('/actor/{id}/content/post.json', 'BinController@postObject');
Route::get('/actor/{id}/following', 'BinController@actorFollowing');
Route::get('/actor/{id}/followers', 'BinController@actorFollowers');
Route::get('/actor/{id}', 'BinController@actor');
Route::get('/rb/{id}/logs', 'BinController@binLogs');

Route::view('about', 'site.about')->name('about');

// Auth::routes();

// Route::redirect('/home', '/dashboard');
// Route::get('/dashboard', 'DashboardController@home')->name('home');
// Route::get('/dashboard/bins', 'DashboardController@bins');
// Route::get('/dashboard/account', 'DashboardController@account');
// Route::post('/dashboard/account', 'DashboardController@accountStore');
// Route::get('/dashboard/update-password', 'DashboardController@updatePassword')->name('account.update-password');
// Route::post('/dashboard/update-password', 'DashboardController@updatePasswordStore');
