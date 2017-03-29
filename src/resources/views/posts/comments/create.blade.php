<div class="col-sm-10 col-sm-offset-1">
	<form class="form-horizontal" method="post" action="{{ route('comment.add', ['post' => $post->id]) }}">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-xs-1">
				<div class="row">
					<img src="{{ auth()->user()->thumbnail() }}" alt="" class="image-responsove">
				</div>
			</div><!-- End Of col xs 1 -->

			<div class="col-xs-11">
					<div class="form-group">
				  		<input class="form-control" type="text" name="comment" placeholder="Write a comment...">
				  	</div>		
			</div><!-- End Of col xs 11 -->
		</div> <!-- End Of row -->
	</form>
</div><!-- End Of col sm 10 and -->
