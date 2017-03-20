@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="container" id="Create-Edit-Container">
            <h2 class="ui center aligned icon header">
            All Your Preferred Locations
        </h2>
            <hr>
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
                    <a href="{{ route('user.addlocation') }}">
                        <button class="btn btn-primary">Add More</button>
                    </a>
                </div>
            </div>
            </form>
        </div>
        <!-- close container -->
        <br>
        <br>
    </div>
</div>
@endsection @section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYWNG227Qo2dW02qHZGSqj0Y3oOAwF5HQ&libraries=places&v=3&callback=allClubs">
</script>
@stop
