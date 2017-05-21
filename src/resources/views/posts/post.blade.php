 <div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
                        <div class="padding-css">
                            <div class="col-xs-2 col-sm-1 image-thumb">
                                <div class="row flex-center">
                                    <img src="{{ $post->user->thumbnail() }}" class="">
                                </div>
                            </div>
                            <div class="user-post-details col-xs-5">
                                <span ><b>{{ $post->user->firstname }}</b></span>
                                <span class="small">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-xs-3 col-xs-offset-2">
                                @can('delete', $post)
                                    <span class="pull-right">
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/posts', $post->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn gray-background btn-xs',
                                                    'title' => 'Delete Post',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            ))!!}
                                        {!! Form::close() !!}
                                    </span>
                                @endcan
                            </div>  
                            <div class="clearfix"></div>
                        </div>
                            
                        <div class="padding-css border-top">
                                <p class="text-post-share">
                                    {{ $post->body }}
                                </p>

                                @if($post->image)
                                <div class="post-image padding-10 img-thumbnail" style="background-image: url('{{ $post->imageUrl() }}')">
                                </div>
                                @endif
                        </div>
                        
                        <div class="padding-10 border-top">
                            <div class="padding-10 col-md-6 likeshare">
                                <span>
                                     @if ($post->liked)
                                        <i class="fa fa-heart"></i> {{ $post->likesCount }}  <a href="{{ route('post.unlike', ['post' => $post->id]) }}"> unlike</a>
                                    @else
                                        <i class="fa fa-heart"></i> {{ $post->likesCount }}   <a href="{{ route('post.like', ['post' => $post->id]) }}">like</a>
                                    @endif
                                </span>
                                <span><i class="fa fa-commenting-o"></i> {{ $post->comments->count() }} {{ str_plural('Comment', $post->comments->count()) }} </span>
                            </div>
                            <div class="col-sm-12 gray-background padding-css">
                                <b>{{ $post->comments->count() }} {{ str_plural('Comment', $post->comments->count()) }} </b>
                                @include('posts.comments.comments', ['post' => $post])
                            </div>
                        </div>
        </div><!-- End Of Post Column -->
    </div> <!-- End Of body -->
</div> <!-- End Of panel -->