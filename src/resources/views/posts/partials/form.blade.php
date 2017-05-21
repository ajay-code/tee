<div class="wall-con col-md-12">
	<form action="{{ url('/posts') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
		{{ csrf_field()  }}
		<div class="col-md-10">
			<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
		        <textarea name="body" cols="30" rows="6" id="body" class=" text-post" placeholder="Whats on your mind...."></textarea>
		        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
		<div class="col-md-2">
			<button class="btn-send">Post</button>
		</div>
		<div class="col-md-12">
			<label id="photo-label" for="photo"><i class="fa fa-camera"></i> Upload Photo</label>
			<input id="photo" class="display-none" name="image" type="file" accept="image/*">
		</div>
	</form>
</div>