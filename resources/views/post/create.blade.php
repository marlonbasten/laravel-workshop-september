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

<form action="{{ route('post.store') }}" method="POST">
    @csrf
    <input type="text" name="title"><br>
    <textarea name="content"></textarea><br><br>
    <input type="submit" value="Post erstellen">
</form>

@endsection
