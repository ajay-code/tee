@extends('layouts.message')

@section('content')
<div class="container" id="message-layout">
	@include('message.partials.flash')
	<div class="row">

    	<div class="col-sm-4 users-container">
			<div class="row message-title specific-border">USERS</div>
    		<div class="row message-indi-con">
    			@each('message.partials.thread', $threads, 'thread', 'message.partials.no-threads')
			</div>
		</div>

		<div class="col-sm-8 messages-container">
			<div class="row message-title">MESSAGES</div>
					
	    		<chat post-url="{{ route('messages.user.update', $friend->id) }}" chat-url="{{ route('messages.user.show.api', $friend->id) }}" :thread="{{ $thread }}" :users="{{ $users }}" :current-user="{{ auth()->user() }}" :messages="{{ $thread->messages }}"></chat>
		</div>
	</div>
</div>
@stop
