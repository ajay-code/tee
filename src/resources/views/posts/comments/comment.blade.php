<div class="row">
    <div class="col-xs-12" style="padding:10px;">
        <div class="col-xs-1">
            <img src="{{ $comment->creator->thumbnail() }}" alt="" class="image-responsove">
        </div>
        <div class="col-xs-6">
            <span class="text-primary"><b>{{ $comment->creator->firstname }}</b></span> {{ $comment->body }} <span class="small">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
