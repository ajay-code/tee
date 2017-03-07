@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row profile">
        <div class="col-sm-4 col-md-3">
            <div class="panel panel-default">
                <div class="profile__image__container">
                    <img id="avatar" src="{{ getStorageUrl($user->avatar) }}" class="profile__image" alt="">
                </div>
            </div>
            <button id="upload-pic-button" class="btn btn-block btn-default" data-toggle="modal" data-target="#upload-pic">Change</button>
        </div>
        <div class="col-sm-8 col-md-9">
            <div class="panel panel-default">
                <div class="profile__detail">
                    <div class="col-sm-6 col-sm-offset-1">
                    <h4>Information</h4>
                    <div class="table-responsive">
                    <table class="table table-condensed table-responsive table-user-information">
                        <tbody>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Username
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->username ? $user->username: '---' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Firstname
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->firstname ? $user->firstname: '---' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Lastname
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->lastname ? $user->lastname: '---' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Email
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->email ? $user->email: '---' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        BirthDay
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->dob->toFormattedDateString() ? $user->dob->toFormattedDateString() : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Age
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->age ? $user->age->format('%y Year, %m Months and %d Days') : '---' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Phone Number
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->phone_number ? $user->phone_number: '---' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Gender
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->sex ? $user->sex: '---' }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Handicap
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->handicap ? $user->handicap: '---' }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                        Language
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    {{ $user->lang ? $user->lang: '---' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('updateprofile') }}"><button class="btn btn-primary">Edit</button></a>
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
                    <img id="image" src="{{ getStorageUrl($user->avatar) }}" alt="">
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
