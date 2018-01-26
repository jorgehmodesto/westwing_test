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

Auth::routes();

Route::view('/', 'home')->middleware('auth');

Route::view('/home', 'home')->middleware('auth');

Route::view('/ticket/new', 'new_ticket')->name('new_ticket')->middleware('auth');

Route::get('/ticket/record', 'TicketController@record')->name('new_ticket_record')->middleware('auth');

Route::get('/ticket/report', 'TicketController@report')->name('ticket_report')->middleware('auth');