@extends('layout.main')

@section('styles')
    <style>
        h1 {
            color: red;
        }
    </style>
@endsection

@section('content')
    <h1>Hallo, {{ $name }}</h1>
    <p>Du bist {{ $age }} Jahre alt.</p>

    @if ($age >= 18)
        <p>Du darfst Alkohol trinken.</p>
    @elseif ($age >= 16)
        <p>Bier geht noch klar.</p>
    @else
        <p>Leider zu jung.</p>
    @endif

    <ul>
        @forelse ($users as $user)
            <li>Name: {{ $user['name'] }}, Alter: {{ $user['age'] }}</li>
        @empty
            <li>Keine Nutzer vorhanden</li>
        @endforelse
    </ul>
@endsection
