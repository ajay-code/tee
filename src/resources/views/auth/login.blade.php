@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('form.login')}}</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group ">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        {{ trans('form.log_into_account') }}
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <input id="email" type="email" class="form-control" placeholder="{{trans('form.email')}}" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <input id="password" type="password" class="form-control" placeholder="{{ trans('form.password') }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{trans('form.login')}}
                                        </button>


                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="row">
                                            <div class="checkbox col-sm-6">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('form.remember')}}
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{trans('form.forgot_password')}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <div class="col-sm-6">

                        <div class="col-sm-10 col-sm-offset-1" >
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{ url('/register') }}">{{trans('form.dont_have_account')}}</a>
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-block btn-social btn-google" href="{{url('/login/google')}}">
                                        <span class="fa fa-google"></span>
                                        {{ trans('form.google_signin') }}
                                    </a>
                                </div>

                                <div class="form-group">
                                    <a class="btn btn-block btn-social btn-facebook" href="{{url('/login/facebook')}}">
                                        <span class="fa fa-facebook"></span>
                                        {{ trans('form.facebook_signin') }}
                                    </a>
                                </div>

                                <div class="form-group">
                                    <a class="btn btn-block btn-social btn-twitter" href="{{url('/login/twitter')}}">
                                        <span class="fa fa-twitter"></span>
                                        {{ trans('form.twitter_signin') }}
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- 
@extends('layouts.test')

@section('content')
    @php
        phpinfo();
    @endphp
@endsection --}}