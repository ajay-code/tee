@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row">
        <div class="container" id="Create-Edit-Container">
            <h2 class="ui center aligned icon header">
            All Your Preferred Clubs
        </h2>
            <hr>
        <form action="{{ route('user.club.delete') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="club_id" id="club-id">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" name="location" class="form-control" id="location" placeholder="Location" value disabled>
                </div>
                <div id="map"></div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lat">Lat:</label>
                    <input type="text" class="form-control input-sm" name="lat" id="lat" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lng">Lng:</label>
                    <input type="text" class="form-control input-sm" name="lng" id="lng" disabled>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <div class="form-group">
                    
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </div>
            </div>
            </form>
            <div class="col-md-12">
            <a href="{{ route('user.club.add') }}">
                        <button class="btn btn-primary">Add More</button>
            </a>
            </div>
        </div>
        <!-- close container -->
        <br>
        <br>
    </div>
</div>
@endsection @section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('google.map.key') }}&libraries=places&v=3&callback=allUserClubs">
</script>
@stop
