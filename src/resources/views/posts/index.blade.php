@extends('layouts.app')

@section('content')
    <div class="container">
         <div class="row">
            <div class="col-md-3">
                @include('user.sidebar')
            </div>
        
            <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('posts.partials.form')
                            <div class="col-sm-12">
                                @foreach($posts as $post)
                                            <div class="col-xs-12" style="padding:10px; border-bottom: 1px solid #ccc">
                                                <div class="col-sm-1 " >
                                                    <img src="{{ $post->user->thumbnail() }}" alt="" class="image-responsove">
                                                </div>
                                                <div class="col-sm-6">
                                                    {{ $post->user->firstname }}
                                                    <br>
                                                    {{ $post->created_at->diffForHumans() }}
                                                </div>
                                                <div class="col-sm-5">
                                                    @can('update', $post)
                                                        <span class="pull-right">
                                                            <a href="{{ url('/posts/'.$post->id) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="{{ url('/posts/'.$post->id.'/edit') }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        </span>
                                                    @endcan
                                                </div>
                                                <div class="col-sm-12">
                                                    {{ $post->body }}
                                                    </div>
                                            </div>
                                @endforeach
                            </div>
                        </div> <!-- End Of body -->
                    </div> <!-- End Of panel -->
            </div> <!-- End Of col -->
        </div> <!-- End Of Row -->
    </div>
@endsection
