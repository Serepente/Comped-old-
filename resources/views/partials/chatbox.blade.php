<div class="chatbox-border">
    <div class="chatbox-inside">
        <div class="header">
            <img class="img" src="{{ asset($receiver->profile_pic) }}" alt="Profile Picture" />
            <p>
                <span class="sender-name">{{ $receiver->name }}</span><br>
                <span class="sender-role"> {{ $receiver->status ?? 'Online' }} </span>
            </p>
            <img class="arrowdown" src="{{ asset('frontend/img/arrowdown.png') }}" alt="Arrow Down" />
            <img src="{{ asset('frontend/img/x.png') }}" alt="Close" class="x">
        </div>
        <div class="message-container">
            @foreach ($messages as $message)
                @if ($message->sender_id == auth()->id())
                    <div class="message-sent-wrapper">
                        <span class="text-wrapper-time-sent">{{ $message->created_at->format('h:i A') }}</span>
                        <div class="overlap-sent">
                            <div class="text-wrapper-7">{{ $message->message }}</div>
                        </div>
                        <img class="jebel" src="{{ asset(auth()->user()->profile_pic) }}" alt="Your Profile" />
                    </div>
                @else
                    <div class="message-wrapper">
                        <img class="kyle" src="{{ asset($receiver->profile_pic) }}" alt="Kyle" />
                        <div class="hi-jeriebel-sadasda-wrapper">{{ $message->message }}</div>
                        <span class="text-wrapper-time-recieve">{{ $message->created_at->format('h:i A') }}</span>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="overlap-4">
            <div class="div-wrapper">
                <span class="text-wrapper-letter">Aa</span>
            </div>
            <div class="send-wrapper">
                <input type="text" id="chatMessage" placeholder="Type a message..." class="chat-input">
                <img class="send" src="{{ asset('frontend/img/send.png') }}" alt="Send" id="sendMessage">
            </div>
        </div>
    </div>
</div>
