@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('form.register') }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <a href="{{ url('/login') }}">{{ trans('form.already_member') }}</a>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-0">
                                <div class=" form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="username" type="text" class="form-control" name="username" placeholder="{{ trans('form.username') }}" value="{{ old('username') }}"  autofocus >

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
                                            <input id="email" type="email" class="form-control" name="email" placeholder="{{trans('form.email')}}" value="{{ old('email') }}" >

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
                                        <input id="firstname" type="text" class="form-control" name="firstname" placeholder="{{trans('form.firstname')}}" value="{{ old('firstname') }}"  >

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
                                        <input id="lastname" type="text" class="form-control" name="lastname" placeholder="{{trans('form.lastname')}}" value="{{ old('lastname') }}"  >

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
                                            <input id="password" type="password" class="form-control" name="password" placeholder="{{trans('form.password')}}" required>

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
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{trans('form.confirm_password')}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-md-offset-0">
                                <div class=" form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <div class="">
                                        <input id="dob" onfocus="(this.type='date')" class="form-control" name="dob" placeholder="{{trans('form.dob') . ' ' . trans('form.optional')}}"
                                        value="{{ old('dob') }}"  >

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
                                            <input id="phone_number" type="number" class="form-control" name="phone_number" placeholder="{{trans('form.phone'). ' ' . trans('form.optional')}}" value="{{ old('phone_number') }}" >

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-md-offset-0">
                                    <div class=" form-group{{ $errors->has('handicap') ? ' has-error' : '' }}">
                                        <div class="">
                                            <input id="handicap" type="number" max="52" min="0" class="form-control" name="handicap" placeholder="{{trans('form.handicap')}}" value="{{ old('handicap') }}" >

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
                                            value="{{ old('sex') }}" >
                                                <option value="">{{ trans('form.sex'). ' ' . trans('form.optional') }}</option>
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
                            <div class="checkbox has-error">
                                <label>
                                    <input type="checkbox" value="true" name="terms_accepted" >
                                    <p><a href="#" data-toggle="modal" data-target="#terms-and-conditions">Agree with the terms and conditions</a></p>
                                </label>
                                @if ($errors->has('terms_accepted'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('terms_accepted') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="row">
                            <div class="form-group ">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary  btn-block">
                                        {{ trans('form.register') }}
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
                            {{ trans('form.google_signup') }}
                        </a>

                        <a class="btn btn-block btn-social btn-facebook" href="{{url('/login/facebook')}}">
                            <span class="fa fa-facebook"></span>
                            {{ trans('form.facebook_signup') }}
                        </a>

                        <a class="btn btn-block btn-social btn-twitter" href="{{url('/login/twitter')}}">
                            <span class="fa fa-twitter"></span>
                            {{ trans('form.twitter_signup') }}
                        </a>
                        </div>
<div class="crearfix"></div>

                </div>
            </div>
        </div>

    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="terms-and-conditions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Terms And Conditions</h4>
      </div>
      <div class="modal-body">
          {!! nl2br("Lorem ipsum dolor sit amet, veniam numquam has te. No suas nonumes recusabo mea, est ut graeci definitiones. His ne melius vituperata scriptorem, cum paulo copiosae conclusionemque at. Facer inermis ius in, ad brute nominati referrentur vis. Dicat erant sit ex. Phaedrum imperdiet scribentur vix no, ad latine similique forensibus vel.

          Dolore populo vivendum vis eu, mei quaestio liberavisse ex. Electram necessitatibus ut vel, quo at probatus oportere, molestie conclusionemque pri cu. Brute augue tincidunt vim id, ne munere fierent rationibus mei. Ut pro volutpat praesent qualisque, an iisque scripta intellegebat eam.

          Mea ea nonumy labores lobortis, duo quaestio antiopam inimicus et. Ea natum solet iisque quo, prodesset mnesarchum ne vim. Sonet detraxit temporibus no has. Omnium blandit in vim, mea at omnium oblique.

          Eum ea quidam oportere imperdiet, facer oportere vituperatoribus eu vix, mea ei iisque legendos hendrerit. Blandit comprehensam eu his, ad eros veniam ridens eum. Id odio lobortis elaboraret pro. Vix te fabulas partiendo.

          Natum oportere et qui, vis graeco tincidunt instructior an, autem elitr noster per et. Mea eu mundi qualisque. Quo nemore nusquam vituperata et, mea ut abhorreant deseruisse, cu nostrud postulant dissentias qui. Postea tincidunt vel eu.

          Ad eos alia inermis nominavi, eum nibh docendi definitionem no. Ius eu stet mucius nonumes, no mea facilis philosophia necessitatibus. Te eam vidit iisque legendos, vero meliore deserunt ius ea. An qui inimicus inciderint.") !!}
      </div>
      <div class="modal-footer">
            <button type="submit" data-dismiss="modal" class="btn btn-primary">cancle</button>
      </div>
    </div>
  </div>
</div>

@endsection
