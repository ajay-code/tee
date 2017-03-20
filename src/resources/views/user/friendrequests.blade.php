@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row profile">
        <div class="col-sm-4 col-md-3">
            <div class="panel panel-default">
                <div class="profile__image__container">
                    <img id="avatar" src="{{ $user->avatar() }}" class="profile__image" alt="">
                </div>
            </div>
            <button id="upload-pic-button" class="btn btn-block btn-default" data-toggle="modal" data-target="#upload-pic">Change</button>
        </div>
        <div class="col-sm-8 col-md-9">
            <div class="panel panel-default">
                <div class="profile__detail">
                    <div class="row">
                    <div class="col-md-6 col-sm-offset-1">
                    <h4>Friend Requests</h4>
                    <div class="table-responsive">
                    <table class="table table-responsive table-user-information">
                        <tbody>
                            @foreach ($friendRequests as $request)
                                {{-- {{ var_dump($request->sender) }} --}}
                                <tr>
                                    <td>
                                        <strong>
                                            <img src="{{ $request->sender->thumbnail() }}" alt="">
                                            {{ $request->sender->firstname }}
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <a href="{{ route('user.friendrequest.accept', ['sender' => $request->sender->id ]) }}"><button class="btn btn-primary">Accept</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>





{{-- Upload Picture Model --}}

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
@endsection
