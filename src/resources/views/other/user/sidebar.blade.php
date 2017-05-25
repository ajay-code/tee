<div id="sidebar" class="plain">
<div class="panel panel-default padding-top-10">
    <div class="panel-body">
        <div class="user-image-friend">
             <img id="avatar" class="profile-thumbnail padding-10" src="{{ $user->avatar() }}" class="profile__image" alt="profile Image">
        </div>
        <div class="friend-name">
            <h3>
                <a href="{{ route('user.profile') }}">
                    {{ $user->username ? $user->username : $user->firstname }}
                </a>
            </h3>
        </div>  
    </div>
</div>

<div class="panel panel-default padding-top-10">
    <div class="panel-body">
        
        @if(!$user->isFriendWith(Auth::user()) && !$user->hasFriendRequestFrom(Auth::user()))
            <a href="{{ route('friendrequest', ['user' => $user->id ]) }}" class="margin-10">
                <button class="btn btn-success btn-block">Send Friend Request</button>
            </a>
        @endif
        @if($user->hasFriendRequestFrom(Auth::user()))
                <button class="btn btn-success btn-block margin-top-10">Already Sent Friend Request</button>
        @endif
        @if ($user->isFriendWith(Auth::user()))
            <a href="{{ route('unfriend', ['user' => $user->id ]) }}" class="margin-top-10">
                <button class="btn btn-success btn-block">Unfriend</button>
            </a>
        @endif

        <!-- Message Button -->
        @if ($user->settings->can_send_message == 'everyone')
            <a class="margin-10" href="{{ route('messages.user.show', ['user' => $user->id]) }}">
                <button id="upload-pic-button" class="btn btn-block btn-success">Message</button>
            </a>
        @elseif($user->isFriendWith(auth()->user()))
            <a class="margin-10" href="{{ route('messages.user.show', ['user' => $user->id]) }}">
                <button id="upload-pic-button" class="btn btn-block btn-success">Message</button>
            </a>
        @endif
    </div>
</div>


<div class="panel panel-default padding-top-10">
    <div class="panel-body">
        <div class="menu-bar-style ">
            <div class="list " >
                
                <div class="list-item"><!-- list item -->
                    <div class="col-xs-2">
                        <a href="{{ route('other.user.profileinfo', ['user' => $user->id]) }}">
                            <span class="list-icon">
                                <i class="fa fa-info"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-xs-10">
                        <a href="{{ route('other.user.profileinfo', ['user' => $user->id]) }}">
                            <span class="list-text">ProfileInfo</span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div><!--End list item -->

                <!--show Users Friend list on condition-->
                @if($user->settings->can_view_friends == 'everyone')
                <div class="list-item"><!-- list item -->
                    <div class="col-xs-2">
                        <a href="{{ route('other.user.friends', ['user' => $user->id]) }}">
                            <span class="list-icon">
                                <i class="fa fa-users "></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-xs-10">
                            <a href="{{ route('other.user.friends', ['user' => $user->id]) }}">
                                <span class="list-text">Friends</span>
                                @if ($user->getFriends()->count() > 0)
                                    <span class="label label-danger">{{ $user->getFriends()->count() }}</span>
                                @endif
                            </a>
                    </div>
                    <div class="clearfix"></div>
                </div><!--End list item -->
                @elseif($user->settings->can_view_friends == 'friends')
                    @if($user->isFriendWith(auth()->user()))
                        <div class="list-item"><!-- list item -->
                            <div class="col-xs-2">
                                <a href="{{ route('other.user.friends', ['user' => $user->id]) }}">
                                    <span class="list-icon">
                                        <i class="fa fa-users "></i>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xs-10">
                                    <a href="{{ route('other.user.friends', ['user' => $user->id]) }}">
                                        <span class="list-text">Friends</span>
                                        @if ($user->getFriends()->count() > 0)
                                            <span class="label label-danger">{{ $user->getFriends()->count() }}</span>
                                        @endif
                                    </a>
                            </div>
                            <div class="clearfix"></div>
                        </div><!--End list item -->
                    @endif
                @endif

            </div>
            
        </div>
    </div>
</div>
</div>