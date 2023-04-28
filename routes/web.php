<?php

use App\Models\Choice;
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
use Illuminate\Http\Request;

Route::get('/', function () {
    $choice=Choice::where('student_id',auth()->user()->id)
    ->where('is_accpted',true)
    ->first();
    
    if($choice){
        return view('choice', [
            'resources' => Filament::getResources(),
            'topic' =>$choice->topic,
        ]);
    }else {
        $topics = Topic::where('special_id', auth()->user()->special_id)->get();
        return view('home', [
            'resources' => Filament::getResources(),
            'topics' => $topics,
        ]);
    }

})->name('home')->middleware('RedirectIfNotAuthenticated');

Route::get('/demand/{id}', function ($id) {
    $topic = Topic::find($id);
    return view('demand', [
        'topic' => $topic,
    ]);
})->name('demand')->middleware('RedirectIfNotAuthenticated');


Route::post('/choice', function (Request $request) {
    $validatedData = $request->validate([
        'student_id' => 'required',
        'teacher_id' => 'required',
        'topic_id' => 'required',
        'comment' => 'required',
    ]);

    $choice = new Choice;

    $choice->student_id = $validatedData['student_id'];
    $choice->teacher_id = $validatedData['teacher_id'];
    $choice->topic_id = $validatedData['topic_id'];
    $choice->comment = $validatedData['comment'];
    $choice->save();

    $topics = Topic::where('special_id', auth()->user()->special_id)->get();;
    return view('home',['topics' => $topics]);
})->name('choice.store')->middleware('RedirectIfNotAuthenticated');

