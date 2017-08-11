@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
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

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('common.edit_settings')</div>
                    <div class="panel-body">
                        {{-- <a href="{{ url('/settings/setting') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> --}}
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($setting, [
                            'method' => 'PATCH',
                            'url' => ['/settings'],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('setting.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Upload Picture Model --}}
    @include('user.partials.uploadmodal')
@endsection
