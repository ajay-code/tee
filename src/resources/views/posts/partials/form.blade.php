<form action="{{ url('/posts') }}" method="post" class="form-horizontal">
	{{ csrf_field()  }}
    <div class="col-sm-10 ">
		<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
		        <textarea name="body" cols="30" rows="3" id="body" class="form-control"></textarea>
		        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
	    	<button class="btn btn-primary btn-block">Post</button>
	    </div>
	</div>

</form>