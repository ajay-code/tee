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
                                <div class="col-sm-12">
                                    <h3 style="color:#42b350"><i class="fa fa-users"></i> FRIENDS ({{ $friends->count() }})</h3>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                @foreach ($friends as $friend)
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                                <div class="flex-center flex-direction-col friend">   
                                                    <img class="block size-300x300" src="{{ $friend->avatar() }}" alt="">
                                                    <p>
                                                    <b>
                                                        <a href="{{ route('other.user.profile', ['user' => $friend->id]) }}">{{ $friend->firstname }}</a>
                                                    </b>
                                                    </p>
                                                </div>
                                    </div>
                                @endforeach
                                
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        
{{-- Upload Picture Model --}}
@include('user.partials.uploadmodal')
@endsection
