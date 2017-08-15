<!-- Modal -->
<div class="modal show" id="accept-terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Terms And Conditions</h4>
      </div>
      <div class="modal-body">
          @include('layouts.partials.models.terms')
      </div>
      <div class="modal-footer">
        <form action="{{ route('user.termsaccepted') }}" method="post">
            {{ csrf_field() }}
            <div class="checkbox">
              <label for="terms_accepted">
              <input type="checkbox" class="checkbox" id="terms_accepted" name="terms_accepted" value="true">
              Agree with the terms and conditions
              </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
