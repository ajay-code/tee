@extends('layouts.app')

@section('content')
    <div class="container">
         <div class="row">
            <div class="col-md-3">
                @include('user.sidebar')
            </div><!-- End Of col 3 -->
        
            <div class="col-md-9">
                    @include('posts.posts')
            </div> <!-- End Of col 9 -->
        </div><!-- End Of Row -->
    </div> <!-- End Of Container -->
@endsection
