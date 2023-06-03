@extends('layouts.app')

@section('content')

<form method="POST" action="{{route('choice.store')}}">
    @csrf

    <input type="hidden"  name="student_id" value="{{Auth::id()}}" id="topic_id"  required>
    <input type="hidden"  name="topic_id" value="{{$topic->id}}" id="topic_id"  required>

    <div>
        <label for="title">Title:</label>
        <input type="text" disabled name="title" value="{{$topic->title}}" id="title" class="border-yellow-600 border-2 p-2 rounded-md w-full" required>
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea disabled name="description"  id="description" class="border-yellow-600 border-2 p-2 rounded-md w-full" required>{{Strip_tags($topic->description)}}</textarea>
    </div>
    <div>
        <label for="technology">Requirement:</label>
        <textarea disabled name="technology"  id="technology" class="border-yellow-600 border-2 p-2 rounded-md w-full" required>{{Strip_tags($topic->technology)}}</textarea>
    </div>
    <div>
        <label for="teacher">Teacher:</label>
        <input type="hidden"  name="teacher_id" value="{{$topic->teacher->id}}" id="teacher_id"  required>
        <input disabled type="text" name="teacher" value="{{$topic->teacher->name}}" id="teacher" class="border-yellow-600 border-2 p-2 rounded-md w-full" required>
    </div>
    <div>
        <input type="checkbox" name="is_binome" value="0" id="is_binome"> your have binome
    </div>
    <div id="binome_id_div" style="display: none;">
     <label for="binome_id">your Binome:</label>
    <select name="binome_id"  class="border-yellow-600 border-2 p-2 rounded-md w-full">
        @foreach ($students as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    </div>
    <div>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" class="border-yellow-600 border-2 p-2 rounded-md w-full"></textarea>
    </div>

    <div class="mt-4">
        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </div>
</form>

<script>
    const showSelectCheckbox = document.getElementById('is_binome');
    const userSelect = document.getElementById('binome_id_div');

    showSelectCheckbox.addEventListener('change', function() {
        userSelect.style.display = this.checked ? 'block' : 'none';
    });

     // Submit the form with a value of 'false' for 'is_binome' when it is not checked
     document.querySelector('form').addEventListener('submit', function() {
        if (!showSelectCheckbox.checked) {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'is_binome');
            hiddenInput.setAttribute('value', 'off');
            this.appendChild(hiddenInput);
        }
    });
</script>
@endsection