@if($post->comments->count() > 0)
	@each('posts.comments.comment', $post->comments, 'comment')
@endif
@include('posts.comments.create', ['post' => $post])