<li>
	@php
			$from = App\User::find($notification->data['from']);
			if(isset($notification->data['post'])){
				$post = App\Post::find($notification->data['post']);
			}
	@endphp
	@if ($notification->type == 'App\Notifications\PostLiked')
		
		<a href="{{ url('/posts'). '/' . $post->id }}">
			
			<img class="notification-image pull-left" src="{{ $from->thumbnail() }}" alt="{{ $from->name }}">
			<span class="small pull-left">{{ $from->name }} Liked your Post</span>

			<div class="clearfix"></div>
			
		</a>
	@elseif($notification->type == 'App\Notifications\Commented')
		<a href="{{ url('/posts'). '/' . $post->id }}">
			
			<img class="notification-image pull-left" src="{{ $from->thumbnail() }}" alt="{{ $from->name }}">
			<span class="small pull-left">{{ $from->name }} commented on your Post</span>

			<div class="clearfix"></div>
			
		</a>
	@elseif($notification->type == 'App\Notifications\FriendRequestAccepted')
		<a href="{{ route('other.user.profile', ['user' => $from->id]) }}">
			
			<img class="notification-image pull-left" src="{{ $from->thumbnail() }}" alt="{{ $from->name }}">
			<span class="small pull-left">{{ $from->name }} Accepted your friend request</span>

			<div class="clearfix"></div>
			
		</a>
	@endif

</li>
