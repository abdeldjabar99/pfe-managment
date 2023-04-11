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

</div>

@endsection
