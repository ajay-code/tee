 <div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="row padding-css">
                            <div class="col-xs-2 col-sm-1 image-thumb">
                                <div class="row flex-center">
                                    <img src="{{ $post->user->thumbnail() }}" class="">
                                </div>
                            </div>
                            <div class="user-post-details col-xs-5">
                                <span ><b>{{ $post->user->firstname }}</b></span>
                                <span class="small">{{ $post->created_at->diffForHumans() }}</span>
                            </div>  
                        </div>
                        <div class="row padding-css">
                            <div class="col-md-10">
                                <p class="text-post-share">
                                    {{ $post->body }}
                                </p>
                            </div>  
                        </div>
                        
                        <div class="row padding-css">
                            <div class="col-md-6 likeshare">
                                <span>
                                     @if ($post->liked)
                                        <i class="fa fa-heart"></i> {{ $post->likesCount }}  <a href="{{ route('post.unlike', ['post' => $post->id]) }}"> unlike</a>
                                    @else
                                        <i class="fa fa-heart"></i> {{ $post->likesCount }}   <a href="{{ route('post.like', ['post' => $post->id]) }}">like</a>
                                    @endif
                                </span>
                                <span><i class="fa fa-commenting-o"></i> {{ $post->comments->count() }} {{ str_plural('Comment', $post->comments->count()) }} </span>
                            </div>
                            <div class="col-sm-12">
                                <hr>
                                <b>{{ $post->comments->count() }} {{ str_plural('Comment', $post->comments->count()) }} </b>
                                @include('posts.comments.comments', ['post' => $post])
                            </div>
                        </div>
        </div><!-- End Of Post Column -->
    </div> <!-- End Of body -->
</div> <!-- End Of panel -->