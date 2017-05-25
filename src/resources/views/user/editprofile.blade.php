@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-3">
            @component('user.sidebar')
                    @slot('uploadimage')
                        <div class="panel panel-default padding-top-10">
                            <div class="panel-body">
                                <button id="upload-pic-button" class="btn btn-block btn-success" data-toggle="modal" data-target="#upload-pic">Change Profile Picture</button>
                            </div>
                        </div>
                    @endslot
            @endcomponent
        </div>
        <div class="col-sm-8 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('form.edit_profile') }}</div>
                <div class="panel-body">
                    <a href="{{ route('user.profileinfo') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br>
                    <br>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.updateprofile') }}">
                        {{ csrf_field() }}
                                <div class="col-md-5 col-md-offset-1">
                                <div class=" form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username">{{trans('form.username')}}</label>
                                    <div class="">
                                        <input id="username" type="text" class="form-control" name="username" placeholder="{{ trans('form.username') }}" value="{{ old('username') ? old('username') : $user->username  }}"  autofocus >

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                                <div class=" form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <label for="firstname">{{trans('form.firstname')}}</label>
                                    <div class="">
                                        <input id="firstname" type="text" class="form-control" name="firstname" placeholder="{{ trans('form.firstname') }}" value="{{ old('firstname') ? old('firstname') : $user->firstname }}" required >

                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class=" form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <label for="lastname">{{trans('form.lastname')}}</label>
                                    <div class="">
                                        <input id="lastname" type="text" class="form-control" name="lastname" placeholder="{{ trans('form.lastname') }}" value="{{ old('lastname') ? old('lastname') : $user->lastname }}" required >

                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class=" form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="dob">{{trans('form.dob')}}</label>
                                    <div class="">
                                        <input id="dob" type="date" class="form-control" name="dob" placeholder="DOB"
                                        value="{{ old('dob') ? old('dob') : $user->dob ? $user->dob->toDateString() : ''}}" >

                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-5 col-md-offset-1">


                                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <label for="phone">{{trans('form.phone')}}</label>
                                        <div class="">
                                            <input id="phone_number" type="number" class="form-control"
                                             name="phone_number" placeholder="{{ trans('form.phone') }}"
                                             value="{{ old('phone_number') ? old('phone_number') : $user->phone_number }}" >

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" form-group{{ $errors->has('handicap') ? ' has-error' : '' }}">
                                        <label for="handicap">{{trans('form.handicap')}}</label>
                                        <div class="">
                                            <input id="handicap" type="number" max="52" min="0" class="form-control" name="handicap" placeholder="{{ trans('form.handicap') }} (0-52)" value="{{ old('handicap') ? old('handicap') : $user->handicap }}" >

                                            @if ($errors->has('handicap'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('handicap') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                        <label for="sex">{{trans('form.sex')}}</label>
                                        <div class="">

                                            <select id="sex" class="form-control" name="sex"
                                            value="{{ old('sex') }}" >
                                                <option value="">{{ trans('form.sex') }}</option>
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
                                        <label for="language">{{trans('form.language')}}</label>
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

                                            @if ($errors->has('lang'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lang') }}</strong>
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
                                        Update
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
