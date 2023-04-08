@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2 class="text-3xl text-green-600 font-bold mb-10">Congratulations, you have  accepted into this topic</h2>
</div>
<div class="bg-white rounded-lg shadow-lg p-8 text-center">
    <h2 class="text-xl font-medium mb-4">{{ $topic->title }}</h2>
    <p class="text-gray-600">{{ Strip_tags($topic->description) }}</p>
    <p class="text-gray-600">{{ $topic->technology }}</p>
    <p class="text-gray-600  font-bold ">by:<span class="text-yellow-600">{{ $topic->teacher->name  }}</span></p>
    <div class="px-6 py-2">
        <a href="{{route('demand',['id'=> $topic->id])}}" class="inline-block text-slate-100 rounded-full px-3 py-2 text-sm font-semibold bg-yellow-600 mr-2">Download permit</a>
    </div>
</div>

@endsection
