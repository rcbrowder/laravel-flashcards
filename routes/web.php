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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/cards', 'CardController');
Route::resource('/decks', 'DeckController');
Route::get('/quiz/{deck}', function ($deck) {
    $deck = \App\Deck::find($deck);
    $cards = \App\Card::where('deck_id', $deck)->get();

    return view('quiz', compact($cards));
});
