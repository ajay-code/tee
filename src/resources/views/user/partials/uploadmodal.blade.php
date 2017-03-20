
<div id="upload-pic" class="modal fade ">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Picture</h4>
      </div>
      <div class="modal-body">
                <div class="img-container" >
                    <img id="image" src="{{ $user->avatar() }}" alt="">
                </div>
                <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                    <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                    <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                      <span class="fa fa-upload"> Upload</span>
                    </span>
                </label>
                <span id="photo-upload-url" data-url="{{ url('/profile/photo') }}"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="upload-to-server" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
