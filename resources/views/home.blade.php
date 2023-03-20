@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2 class="text-3xl font-bold mb-10">Suggested topics</h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

@foreach($topics as $topic)
<div class="max-w-sm rounded overflow-hidden shadow-lg">
    <div class="px-6 py-8">
        <div class="font-bold text-xl mb-2">{{ $topic->title }}</div>
        <p class="text-gray-700 text-base">
            {{ Str::limit(Strip_tags($topic->description),30,'...') }}
        </p>
    </div>
    <div class="px-6">
        <p class="inline-block text-gray-50-100   mr-2"><span class="font-bold">Project framed by :</span>{{ $topic->teacher->name }}</p>
    </div>
    <div class="px-6 py-2">
        <a href="{{route('demand',['id'=> $topic->id])}}" class="inline-block text-slate-100 rounded-full px-3 py-2 text-sm font-semibold bg-yellow-600 mr-2">Demand Topic</a>
    </div>
</div>

@endforeach

</div>
@endsection
