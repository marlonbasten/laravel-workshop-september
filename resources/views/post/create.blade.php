@extends('layout.main')

@section('content')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

{{ session('message') }}

<form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="thumbnail"><br>
    <select name="category_id">
        <option value="">Auswählen...</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>
    <select name="tags[]" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select><br>
    <input type="text" name="title"><br>
    <textarea name="content"></textarea><br><br>
    <input type="submit" value="Post erstellen">
</form>

@endsection
