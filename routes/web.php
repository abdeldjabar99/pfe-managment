<?php

use App\Models\Choice;
use App\Models\Student;
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
    $students=Student::all();
    return view('demand', [
        'topic' => $topic,
        'students' =>$students,
    ]);
})->name('demand')->middleware('RedirectIfNotAuthenticated');


Route::post('/choice', function (Request $request) {
    $validatedData = $request->validate([
        'student_id' => 'required',
        'teacher_id' => 'required',
        'topic_id' => 'required',
        'comment' => 'required',
        'is_binome' => 'nullable',
        'binome_id' => 'nullable',
    ]);

    $choice = new Choice;
    $choice->student_id = $validatedData['student_id'];
    $choice->teacher_id = $validatedData['teacher_id'];
    $choice->topic_id = $validatedData['topic_id'];
    $choice->comment = $validatedData['comment'];
    $choice->is_binome = $validatedData['is_binome'] === 'on' ? true:false;
    $choice->binome_id = $validatedData['binome_id'];
    $choice->save();
    if($choice->is_binome){
        $choice_binome = new Choice;

        $choice_binome->student_id = $validatedData['binome_id'];
        $choice_binome->teacher_id = $validatedData['teacher_id'];
        $choice_binome->topic_id = $validatedData['topic_id'];
        $choice_binome->comment = $validatedData['comment'];
        $choice_binome->is_binome = $validatedData['is_binome'] === 'on' ? true:false;
        $choice_binome->binome_id = $validatedData['student_id'];
        $choice_binome->save();
    }
    
    $topics = Topic::where('special_id', auth()->user()->special_id)->get();;
    return view('home',['topics' => $topics]);
})->name('choice.store')->middleware('RedirectIfNotAuthenticated');

