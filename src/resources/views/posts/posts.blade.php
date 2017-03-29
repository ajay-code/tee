<div class="row">
	<div class="col-xs-12">	
		<div class="panel panel-default">
		    <div class="panel-body">
		        @include('posts.partials.form')
		    </div> <!-- End Of body -->
		</div> <!-- End Of panel -->

	    @each('posts.post', $posts, 'post')
    
	</div><!-- End Of col 12 -->
</div>