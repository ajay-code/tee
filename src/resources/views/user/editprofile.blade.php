@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('updateprofile') }}">
                        {{ csrf_field() }}
                                <div class="col-md-5 col-md-offset-1">
                                <div class=" form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="username" type="text" class="form-control" name="username" placeholder="username" value="{{ old('username') ? old('username') : $user->username  }}"  autofocus >

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                                <div class=" form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="firstname" type="text" class="form-control" name="firstname" placeholder="First Name" value="{{ old('firstname') ? old('firstname') : $user->firstname }}" required >

                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class=" form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Last Name" value="{{ old('lastname') ? old('lastname') : $user->lastname }}" required >

                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class=" form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="dob" type="date" class="form-control" name="dob" placeholder="DOB"
                                        value="{{ old('dob') ? old('dob') : $user->dob->toDateString() }}" >

                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-5 col-md-offset-1">


                                    <div class=" form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <div class="">
                                            <input id="phone_number" type="number" class="form-control"
                                             name="phone_number" placeholder="Phone Number (Optional)"
                                             value="{{ old('phone_number') ? old('phone_number') : $user->phone_number }}" >

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" form-group{{ $errors->has('handicap') ? ' has-error' : '' }}">
                                        <div class="">
                                            <input id="handicap" type="number" max="52" min="0" class="form-control" name="handicap" placeholder="Handicap (0-52)" value="{{ old('handicap') ? old('handicap') : $user->handicap }}" >

                                            @if ($errors->has('handicap'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('handicap') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                        <div class="">

                                            <select id="sex" class="form-control" name="sex"
                                            value="{{ old('sex') }}" >
                                                <option value="">Gender</option>
                                                <option value="male"
                                                {{
                                                    (old('sex') ? old('sex') : $user->sex) == 'male' ? "selected":"" }}
                                                >Male</option>
                                                <option value="female"
                                                {{
                                                    (old('sex') ? old('sex') : $user->sex) == 'female' ? "selected":"" }}
                                                >Female</option>

                                            </select>

                                            @if ($errors->has('sex'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('sex') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" form-group{{ $errors->has('lang') ? ' has-error' : '' }}">
                                        <div class="">

                                            <select id="lang" class="form-control" name="lang"
                                            value="{{ old('lang') }}" >
                                                <option value="">Language</option>
                                                <option value="en"
                                                {{
                                                    (old('lang') ? old('lang') : $user->lang) == 'en' ? "selected":"" }}
                                                >English</option>
                                                <option value="fr"
                                                {{
                                                    (old('lang') ? old('lang') : $user->lang) == 'fr' ? "selected":"" }}
                                                >French</option>

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
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        </div>

                        </div>
                    </form>


<div class="crearfix"></div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection
