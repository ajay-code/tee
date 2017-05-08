<div class="row">
	<div class="col-xs-12">	
		<div class="panel panel-default">
		    <div class="panel-body">
		        @include('posts.partials.form')
		    </div> <!-- End Of body -->
		</div> <!-- End Of panel -->
		
		<div class="">
	    	@each('posts.post', $posts, 'post')
		</div>
		
		@if ($posts->lastPage() > 1)
			<div class="panel panel-default">
			    <div class="panel-body ">
			    	<div class="text-center">
			       		{{ $posts->links() }}
			    	</div>
			    </div> <!-- End Of body -->
			</div> <!-- End Of panel -->
		@endif
    	
	</div><!-- End Of col 12 -->
</div>