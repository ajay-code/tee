<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-xs-12" style="padding:10px;">
            <div class="col-xs-1" >
                <div class="row">
                    <img src="{{ $post->user->thumbnail() }}" alt="" class="image-responsove">
                </div>
            </div>
            <div class="col-xs-6">
                <span class="text-primary"><b>{{ $post->user->firstname }}</b></span>
                <span class="small">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <div class="col-xs-5">
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
            <div class="col-xs-12">
                {{ $post->body }}
            </div>
            <div class="col-xs-12">
                @if ($post->likesCount > 0)
                    <p class="small">
                             this Post has {{ $post->likesCount }} {{ str_plural('like', $post->likesCount) }}
                    </p>
                @endif 
                <p class="small">
                        @if ($post->liked)
                            <i class="fa fa-thumbs-up text-success"></i> <a href="{{ route('post.unlike', ['post' => $post->id]) }}">unlike</a>
                        @else
                            <i class="fa fa-thumbs-up text-success"></i> <a href="{{ route('post.like', ['post' => $post->id]) }}">Like</a>
                        @endif
                </p>   
                <div class="col-sm-12">
                    <b>comments</b>
                    @include('posts.comments.comments', ['post' => $post])
                </div> 
            </div>
        </div><!-- End Of Post Column -->
           
    </div> <!-- End Of body -->
</div> <!-- End Of panel -->
