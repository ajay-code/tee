<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="alert col-sm-12 {{ $class }} border-bottom">
        @foreach($thread->users()->get() as $user)
            @unless(Auth::user()->id == $user->id)
                @php
                    $userId = $user->id 
                @endphp
                <div class="col-sm-4">
                    @if($user->thumbnail()) 
                        <img src="{{ $user->thumbnail() }}" class="thumb-round" alt="">
                    @else
                        <img src="{{ gravatar($user->email) }}" class="thumb-round" alt="">
                    @endif
                </div>
            @endunless
        @endforeach

    <div class="">
    
        <div class="col-sm-8">
        <a href="{{ route('messages.user.show', $userId) }}">
        
            @foreach($thread->users()->get() as $user)
                @unless(Auth::user()->id == $user->id)
                       <h4> {{ $user->name }}</h4>
                @endunless
            @endforeach
        </a>
            <p class="email-style" style="display:block">({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</p>
            <p class="email-style"> 
                {!! $thread->latestMessage->body !!}
            </p>
        </div>
    </div>
</div>
<div class="clearfix"></div>
