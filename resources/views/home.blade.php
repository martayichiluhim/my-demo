<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register & Login</title>
</head>
<body>

@auth
    <p>Congrats you are logged in.</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    <p><a href="/chat">Go to Chat Room</a></p> <!-- Chat room link added -->

    <div style="border: 3px solid black;">
      <h2>Create a New Post</h2>
      <form action="/create-post" method="POST">
      @csrf
      <input type="text" name="title" placeholder="post title">
      <textarea name="body" placeholder="body content..."></textarea>
      <button>Save Post</button>
      </form>
    </div>

    <div style="border: 3px solid black;">
      <h2>All Posts</h2>
      @foreach($posts as $post)
      <div style="background-color: gray; padding: 10px; margin: 10px;">
        <h3>{{$post['title']}}</h3>
        <p>{{$post['body']}} by {{$post->user->name}}</p>
        <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
        <form action="/deletepost/{{$post->id}}" method="POST">
          @csrf 
          @method('DELETE')
          <button>Delete</button>
        </form>
      </div>
      @endforeach
    </div>
@else
    <div style="border: 3px solid black; padding:10px; margin-bottom:15px;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" />
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
            <button type="submit">Register</button>
        </form>
    </div>

    <div style="border: 3px solid black; padding:10px;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginname" placeholder="Name" />
            <input type="password" name="password" placeholder="Password" />
            <button type="submit">Login</button>
        </form>
    </div>
@endauth

</body>
</html>