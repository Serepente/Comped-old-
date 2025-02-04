<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with {{ $receiver->name }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Chat with {{ $receiver->name }}</h2>

    <div id="chat-box">
        @foreach($messages as $message)
            <p>
                <strong>{{ $message->sender->name }}:</strong> {{ $message->message }}
            </p>
        @endforeach
    </div>

    <form id="chat-form">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">
        <input type="text" id="message" name="message" placeholder="Type a message..." required>
        <button type="submit">Send</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#chat-form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{ route('chat.send') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#chat-box').append('<p><strong>You:</strong> ' + $('#message').val() + '</p>');
                            $('#message').val('');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
