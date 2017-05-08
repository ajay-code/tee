<div id="wall">
<div class="personal-menu sidebar">
	<div class="border-bottom">
		<div class="user-image-friend">
			 <img id="avatar" src="{{ Auth::user()->avatar() }}" class="profile__image" alt="profile Image">
		</div>
		<div class="friend-name">
			<h3>{{ Auth::user()->username ? Auth::user()->username : Auth::user()->firstname }}</h3>
		</div>	
	</div>
	<div class="menu-bar-style border-bottom">
		<ul>
			<a href="{{ route('home') }}"><li><i class="fa fa-home"></i>HOME</li></a>
			<a href="{{ route('messages') }}"><li><i class="fa fa-envelope-open"></i>MESSAGES</li></a>
			<a href="{{ route('messages.chats') }}"><li><i class="fa fa-envelope-open"></i>Chats</li></a>
			<a href="{{ route('user.friendrequest') }}"><li><i class="fa fa-handshake-o"></i>REQUEST ({{ auth()->user()->getFriendRequests()->count() }})</span></li></a>
			<a href="{{ route('user.friends') }}"><li><i class="fa fa-users"></i>Friends ({{ auth()->user()->getFriends()->count() }})</span></li></a>
			<a href="{{ route('user.profile') }}"><li><i class="fa fa-pencil"></i>EDIT PROFILE</li></a>
		</ul>
	</div>
	<div class="menu-bar-style ">
		<ul>
			<a href=""><li><i class="fa fa-pencil"></i>CHANGE PASSWORD</li></a>
			<a href=""><li><i class="fa fa-id-badge"></i>PRIVACY SETTINGS</li></a>
		</ul>
	</div>
</div>
</div>