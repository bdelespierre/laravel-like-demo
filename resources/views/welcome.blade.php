<!DOCTYPE html>
<html>
<head>
    <title>Laravel like demo</title>
</head>
<body>
    @guest
        You are not authenticated.
        <form method="GET">
            <input type="hidden" name="login">
            <button>Login</button>
        </form>
    @else
        Authentication successful! Welcome {{ auth()->user()->name }}.
        <form method="GET">
            <input type="hidden" name="logout">
            <button>Logout</button>
        </form>
    @endguest

    <h1>Posts</h1>

    @foreach($posts as $post)
        <div class="post">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->body }}</p>
            @include('like', ['model' => $post])
        </div>
        @unless($loop->last)
            <hr>
        @endunless
    @endforeach
</body>
</html>
