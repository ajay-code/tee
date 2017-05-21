
@foreach ($onlineFriends as $friend)
    <div class="chatlist-item">
        <a href="{{ route('messages.user.show', $friend->id) }}">
            <p class="chatlist-name">
            <img src="{{ $friend->thumbnail() }}" class="chatlist-image" alt="{{ $friend->name }}">
                {{ $friend->name }}
            <span class="pull-right dot"></span>
            </p>
        </a>
    </div>
@endforeach

