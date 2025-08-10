<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Chat Room</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        #messages {
            border: 1px solid #ccc;
            padding: 10px;
            height: 300px;
            overflow-y: scroll;
            background: #f9f9f9;
        }
        .message { margin-bottom: 10px; }
        .message strong { color: #333; }
        form { margin-top: 15px; }
        textarea { width: 100%; height: 60px; }
    </style>
</head>
<body>
    <h1>Chat Room</h1>
    <p><a href="/">Back to Home</a></p>

    <div id="messages">
        @foreach ($messages as $message)
            <div class="message">
                <strong>{{ $message->user->name }}:</strong> {{ $message->content }}
                <br>
                <small>{{ $message->created_at->format('H:i:s') }}</small>
            </div>
        @endforeach
    </div>

    <form action="{{ url('/chat') }}" method="POST">
        @csrf
        <textarea name="content" placeholder="Type your message here..." required maxlength="500"></textarea><br>
        <button type="submit">Send</button>
    </form>
</body>
</html>
