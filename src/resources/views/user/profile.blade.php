@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row profile">
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
            <posts :url="'api/profile'"></posts>
        </div>
    </div>


</div>





{{-- Upload Picture Model --}}
@include('user.partials.uploadmodal')
@endsection
