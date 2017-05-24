@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row profile">
        <div class="col-sm-4 col-md-3">
            @component('user.sidebar')
                    @slot('uploadimage')
                        
                    @endslot
            @endcomponent
        </div>
        <div class="col-sm-8 col-md-9">
            <div class="panel panel-default">
                <div class="profile__detail">
                    <div class="row">
                    <div class="col-md-6 col-sm-offset-1">
                    <h4>User List</h4>
                    <div class="table-responsive">
                    <table class="table table-responsive table-user-information">
                        <tbody>
                            @foreach ($users as $user)
                              <tr>
                                    <td>
                                        <strong>
                                            <img src="{{ $user->thumbnail() }}" alt="">
                                            <a href="{{ route('other.user.profile', ['user' => $user->id]) }}">{{ $user->firstname }}</a>
                                        </strong>
                                    </td>
                                    <td class="text-primary">
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

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection
