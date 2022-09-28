@extends('layout.main')

@section('content')

@if ($withTrashed)
    <a href="{{ route('post.index') }}"><button>Zurück</button></a>
@else
    <a href="{{ route('post.index') }}?trashed=true"><button>Papierkorb</button></a>
@endif

<ul>
    @foreach ($posts as $post)
        <li>
            ID: {{ $post->id }},
            Title: {{ $post->title }},
            Category: {{ $post->category?->name ?? 'Keine' }},
            Tags: {{ $post->tags->pluck('name')->implode(', ') }},
            User: {{ $post->user?->name }}
            @if ($withTrashed)
                <form action="{{ route('post.forceDelete', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" style="background: red; color: white;" value="Endgültig löschen">
                </form>
                <form action="{{ route('post.restore', $post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="submit" style="background: blue; color: white;" value="Wiederherstellen">
                </form>
            @else
                <form action="{{ route('post.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" style="background: red; color: white;" value="Löschen">
                </form>
            @endif
        </li>
    @endforeach
</ul>

{{ $posts->links() }}

@endsection
