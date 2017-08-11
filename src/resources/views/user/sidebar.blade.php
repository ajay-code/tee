<div id="sidebar" class="plain">
<div class="panel panel-default padding-top-10">
	<div class="panel-body">
		<div class="user-image-friend">
			 <img id="avatar" class="profile-thumbnail padding-10" src="{{ Auth::user()->avatar() }}" class="profile__image" alt="profile Image">
		</div>
		<div class="friend-name">
			<h3>
				<a href="{{ route('user.profile') }}">
					{{ Auth::user()->username ? Auth::user()->username : Auth::user()->firstname }}
				</a>
			</h3>
		</div>	
	</div>
</div>

{{ $uploadimage }}


<div class="panel panel-default padding-top-10">
	<div class="panel-body">
		<div class="menu-bar-style ">
			<div class="list " >
				<div class="list-item"><!-- list item -->
					<div class="col-xs-2">
						<a href="{{ route('home') }}">
							<span class="list-icon">
								<i class="fa fa-home "></i>
							</span>
						</a>
					</div>
					<div class="col-xs-10">
						<a href="{{ route('home') }}">
							<span class="list-text">@lang('common.home')</span> 
						</a>
					</div>
					<div class="clearfix"></div>
				</div><!--End list item -->

				<div class="list-item"><!-- list item -->
					<div class="col-xs-2">
						<a href="{{ route('messages') }}">
							<span class="list-icon">
								<i class="fa fa-envelope-open "></i>
							</span>
						</a>
					</div>
					<div class="col-xs-10">
						<a href="{{ route('messages') }}">
							<span class="list-text">@lang('common.messages') </span>
							@include('message.unread-count')
						</a>
					</div>
					<div class="clearfix"></div>
				</div><!--End list item -->

				

				<div class="list-item"><!-- list item -->
					<div class="col-xs-2">
						<a href="{{ route('user.friendrequest') }}">
							<span class="list-icon">
								<i class="fa fa-handshake-o "></i>
							</span>
						</a>
					</div>
					<div class="col-xs-10">
						<a href="{{ route('user.friendrequest') }}">
							<span class="list-text">@lang('common.requests')</span>
							@if (auth()->user()->getFriendRequests()->count() > 0)
								<span class="label label-danger">{{ auth()->user()->getFriendRequests()->count() }}</span>
							@endif
						</a>
					</div>
					<div class="clearfix"></div>
				</div><!--End list item -->

				<div class="list-item"><!-- list item -->
					<div class="col-xs-2">
						<a href="{{ route('user.friends') }}">
							<span class="list-icon">
								<i class="fa fa-users "></i>
							</span>
						</a>
					</div>
					<div class="col-xs-10">
						<a href="{{ route('user.friends') }}">
							<span class="list-text">@lang('common.friends')</span>
							@if (auth()->user()->getFriends()->count() > 0)
								<span class="label label-danger">{{ auth()->user()->getFriends()->count() }}</span>
							@endif
						</a>
					</div>
					<div class="clearfix"></div>
				</div><!--End list item -->

				<div class="list-item"><!-- list item -->
					<div class="col-xs-2">
						<a href="{{ route('user.find.friendsbylocation') }}">
							<span class="list-icon">
								<i class="fa fa-map-marker "></i>
							</span>
						</a>
					</div>
					<div class="col-xs-10">
						<a href="{{ route('user.find.friendsbylocation') }}">
							<span class="list-text">@lang('common.peopleNearby')</span>
						</a>
					</div>
					<div class="clearfix"></div>
				</div><!--End list item -->

				<div class="list-item"><!-- list item -->
					<div class="col-xs-2">
						<a href="{{ route('settings') }}">
							<span class="list-icon">
								<i class="fa fa-gears "></i>
							</span>
						</a>
					</div>
					<div class="col-xs-10">
						<a href="{{ route('settings') }}">
							<span class="list-text">@lang('common.settings')</span>
						</a>
					</div>
					<div class="clearfix"></div>
				</div><!--End list item -->


				<div class="list-item"><!-- list item -->
					<div class="col-xs-2">
						<a href="{{ route('user.profile') }}">
							<span class="list-icon">
								<i class="fa fa-info "></i>
							</span>
						</a>
					</div>
					<div class="col-xs-10">
						<a href="{{ route('user.profileinfo') }}">
							<span class="list-text">@lang('common.profileInfo')</span>
						</a>
					</div>
					<div class="clearfix"></div>
				</div><!--End list item -->
			</div>
			
		</div>
	</div>
</div>
</div>