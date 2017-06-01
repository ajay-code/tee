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

            <div class="col-md-9 col-sm-8">
                <post :post="{{ json_encode($post) }}"></post>
            </div>
        </div>
    </div>
@endsection
