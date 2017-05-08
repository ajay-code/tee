@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row">
        <div class="container" id="Create-Edit-Container">
            <h2 class="ui center aligned icon header">
            All your Locations
        </h2>
            <hr>
            <form action="{{ route('user.place.delete') }}" method="post">
            {{ csrf_field() }}
            <input id="place_id" type="hidden" name="place_id" >
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
                <div class="form-group">
                        <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
            </form>
            <div class="col-md-12">
                <hr>
                <div class="form-group">
                    <a href="{{ route('user.place.add') }}">
                        <button class="btn btn-primary">Add More</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- close container -->
        <br>
        <br>
    </div>
</div>
@endsection 
@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('google.map.key') }}&libraries=places&v=3&callback=allUserPlaces">
</script> 
<script>
    console.log('{{ config('google.map.key') }}')
</script>
@stop
