<div class="panel panel-default">
    <div class="profile__image__container">
        <img id="avatar" src="{{ Auth::user()->avatar() }}" class="profile__image" alt="">
    </div>
</div>
<button id="upload-pic-button" class="btn btn-block btn-default" data-toggle="modal" data-target="#upload-pic">Change</button>