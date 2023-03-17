<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\Topic;
use Filament\Facades\Filament;

Route::get('/', function () {
    $topics = Topic::all();
    return view('home', [
        'resources' => Filament::getResources(),
        'topics' => $topics,
    ]);
})->name('home')->middleware('RedirectIfNotAuthenticated');