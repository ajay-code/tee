@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row profile">
        <div class="col-sm-4 col-md-3">
            @include('user.sidebar')
        </div>
        <div class="col-sm-8 col-md-9">
            <div class="panel panel-default">
                <div class="profile__detail">
                    <div class="row">
                    <div class="col-md-6 col-sm-offset-1">
                    <h4>Friend Requests</h4>
                    <div class="table-responsive">
                    <table class="table table-responsive table-user-information">
                        <tbody>
                            @foreach ($friends as $friend)
                                <tr>
                                    <td>
                                        <strong>
                                            <img src="{{ $friend->thumbnail() }}" alt="">
                                            {{ $friend->firstname }}
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <a href="{{ route('messages.user.show', $friend->id) }}"><button class="btn btn-primary">Chat</button></a>
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