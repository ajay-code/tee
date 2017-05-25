@extends('layouts.app')

@section('content')
    <div class="container">
         <div class="row">
            <div class="col-md-3">
                @include('other.user.sidebar')
            </div>
        
            <div class="col-md-9">
                 <posts-url :url="'/api/users/{{ $user->id }}/posts/'"></posts-url>   
            </div> <!-- End Of col -->
        </div> <!-- End Of Row -->
    </div>
@endsection
