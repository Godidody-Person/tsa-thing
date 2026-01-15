@extends('layouts.app')

@section('title', 'Chat')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

    <style>
        .chat {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .messages {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .message.human{
            padding: 1rem;
            border-radius: 1rem;
            background-color: #ffffffff;
        }

        .message.bot{
            padding: 1rem;
            border-radius: 1rem;
            background-color: transparent;
            width: 100%;
        }

        .thinking {
            display: flex;
            gap: 4px;
            padding: 0.5rem 1rem;
            align-items: center;
            background: #f0f0f0;
            border-radius: 1rem;
            width: fit-content;
        }

        .thinking span {
            width: 8px;
            height: 8px;
            background-color: #666;
            border-radius: 50%;
            display: inline-block;
            animation: bounce 1.4s infinite ease-in-out both;
        }

        .thinking span:nth-child(1) { animation-delay: -0.32s; }
        .thinking span:nth-child(2) { animation-delay: -0.16s; }

        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1.0); }
        }
    </style>
@endsection

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/marked@17.0.1/lib/marked.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var sending = false;
        function sendChat() {
            if (sending) return;
            sending = true;
            $('.messages').append('<div class="message human">' + $('#query').val() + '</div>');
            var query = $('#query').val();
            $('#query').val('');
            $.ajax({
                url: "{{ route('sendChat') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    query: query
                },
                beforeSend: function () {
                    $('.messages').append('<div class="message bot thinking-indicator"><div class="thinking"><span></span><span></span><span></span></div></div>');
                },
                success: function (data) {
                    $('.thinking-indicator').remove();
                    var jsonData = typeof data === 'string' ? JSON.parse(data) : data;
                    console.log(jsonData);
                    var content = jsonData.choices ? jsonData.choices[0].message.content : (jsonData.response || 'No response from AI');
                    $('.messages').append('<div class="message bot">' + marked.parse(content) + '</div>');
                    sending = false;
                },
                error: function (data) {
                    $('.thinking-indicator').remove();
                    console.log(data);
                    sending = false;
                }
            });
        }

        //enter
        $(document).on('keypress', function (e) {
            if (e.which == 13) {
                sendChat();
            }
        });
    </script>
    
    <h1>Chat</h1>
    <p>Ask away! Find out community resources, events, nonprofits, clubs, and more.</p>
    <p class="faint">AI can make mistakes, so DYOR!</p>
    
    <div class="chat">
        <div class="messages"></div>
        <div class="col input">
            <input type="text" name="query" placeholder="Type a query" id="query">
            <button type="submit" aria-label="Send" onclick="sendChat()"><i class="material-symbols-outlined">send</i></button>
        </div>
    </div>
@endsection