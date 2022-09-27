@extends('layout.main')

@section('content')

<ul>
    @foreach ($posts as $post)
        <li>ID: {{ $post->id }}, Title: {{ $post->title }}</li>
    @endforeach
</ul>

@endsection
