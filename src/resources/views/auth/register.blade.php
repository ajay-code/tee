@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}

                                <div class="col-md-5 col-md-offset-0">
                                <div class=" form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="username" type="text" class="form-control" name="username" placeholder="username" value="{{ old('username') }}" required autofocus >

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-5 col-md-offset-2">
                                    <div class=" form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-md-offset-0">
                                <div class=" form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="firstname" type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ old('firstname') }}" required >

                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-5 col-md-offset-2">
                                <div class=" form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" required >

                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-5 col-md-offset-0">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-md-offset-2">
                                    <div class="form-group">
                                        <div class="">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-md-offset-0">
                                <div class=" form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="dob" type="date" class="form-control" name="dob" placeholder="DOB"
                                        value="{{ old('dob') }}" required >

                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-5 col-md-offset-2">
                                    <div class=" form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <div class="">
                                            <input id="phone_number" type="number" class="form-control" name="phone_number" placeholder="Phone Number (Optional)" value="{{ old('phone_number') }}" >

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-md-offset-0">
                                    <div class=" form-group{{ $errors->has('handicap') ? ' has-error' : '' }}">
                                        <div class="">
                                            <input id="handicap" type="number" max="52" min="0" class="form-control" name="handicap" placeholder="Handicap (0-52)" value="{{ old('handicap') }}" required>

                                            @if ($errors->has('handicap'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('handicap') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-md-offset-2">
                                    <div class=" form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                        <div class="">

                                            <select id="sex" class="form-control" name="sex"
                                            value="{{ old('sex') }}" required>
                                                <option value="">Gender</option>
                                                <option value="male"
                                                {{
                                                    old('sex') == 'male' ? "selected":"" }}
                                                >Male</option>
                                                <option value="female"
                                                {{
                                                    old('sex') == 'female' ? "selected":"" }}
                                                >Female</option>

                                            </select>

                                            @if ($errors->has('sex'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('sex') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                        <div class="col-md-6 col-md-offset-3">
                            <div class="row">
                            <div class="form-group ">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary  btn-block">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>

                    <div class="col-md-6 col-md-offset-3" >
                        <div class="row">
                        <a class="btn btn-block btn-social btn-google" href="{{url('/login/google')}}">
                            <span class="fa fa-google"></span>
                            Sign up with Google
                        </a>

                        <a class="btn btn-block btn-social btn-facebook" href="{{url('/login/facebook')}}">
                            <span class="fa fa-facebook"></span>
                            Sign up with Facebook
                        </a>

                        <a class="btn btn-block btn-social btn-twitter" href="{{url('/login/twitter')}}">
                            <span class="fa fa-twitter"></span>
                            Sign up with Twitter
                        </a>
                        </div>
<div class="crearfix"></div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
