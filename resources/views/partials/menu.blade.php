<ul>
    <li><a href="{{ route('index') }}">Home</a></li>
    <li><a href="{{ route('post.index') }}">Alle Posts</a></li>
    <li><a href="{{ route('post.create') }}">Post erstellen</a></li>
</ul>

@foreach($users as $user)
    <p>{{$user->name}}</p>
@endforeach

<hr>
