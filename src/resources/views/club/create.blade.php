@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="container" id="Create-Edit-Container">

        <h2 class="ui center aligned icon header">
            <i class="circular travel icon"></i>
            Add More Clubs
        </h2>

        <hr>

        <form method="post" action="{{ route('club.store') }}" >

            {{ csrf_field() }}

            <div class="col-md-12">
                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                    <label>Enter Locations Here:</label>
                    <input type="text" name="location" class="form-control" id="pac-input" placeholder="Search Places..." value="{{ old('location') }}" >
                    @if($errors->has('location'))
                        <span class="help-block">{{ $errors->first('location') }}</span>
                    @endif
                </div><div id="map"></div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                    <label for="lat">Lat:</label>
                    <input type="text" class="form-control input-sm" name="lat" id="lat" value="{{ old('lat') }}">
                    @if($errors->has('lat'))
                        <span class="help-block">{{ $errors->first('lat') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                    <label for="lng">Lng:</label>
                    <input type="text" class="form-control input-sm" name="lng" id="lng" value="{{ old('lng') }}">
                    @if($errors->has('lng'))
                        <span class="help-block">{{ $errors->first('lng') }}</span>
                    @endif
                </div>
            </div>


            <div class="col-md-12">
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                </div>
            </div>

        </form>

    </div>  <!-- close container -->

    <br><br>
        
    </div>
</div>
@endsection

@section('scripts')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYWNG227Qo2dW02qHZGSqj0Y3oOAwF5HQ&libraries=places&v=3&callback=initMap">
    </script>
@stop