<div class="panel panel-default">
                <div class="profile__image__container">

                    <img id="avatar" src="{{ $user->avatar() }}" class="profile__image" alt="profile Image">

                </div>
                <p class="text-center">Name: {{ $user->username ? $user->username : $user->firstname }}</p>
                <hr>
                <ul>
                    @if(!$user->isFriendWith(Auth::user()) && !$user->hasFriendRequestFrom(Auth::user()))
                        <a href="{{ route('friendrequest', ['user' => $user->id ]) }}">
                            <button class="btn btn-primary">Send Friend Request</button>
                        </a>
                    @endif
                    @if($user->hasFriendRequestFrom(Auth::user()))
                            <button class="btn btn-default">Already Sent Friend Request</button>
                    @endif
                    @if ($user->isFriendWith(Auth::user()))
                                            <a href="{{ route('unfriend', ['user' => $user->id ]) }}">
                                                <button class="btn btn-primary">Unfriend</button>
                                            </a>
                                        @endif
                </ul>
</div>