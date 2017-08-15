@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="container" id="Create-Edit-Container">

        <h2 class="ui center aligned icon header">
            <i class="circular travel icon"></i>
            @lang('common.enter_your_location')
        </h2>
        @lang('common.this_loation_will_be_saved_to_database')
        <hr>
        <div class="col-xs-12 text-center">
            <button id="getloction-btn" class="btn btn-primary" onclick="getloction" >
                <i class="fa fa-map-marker fa-2x"></i> @lang('common.use_current_location')
            </button>
            <br>
            <h1>OR</h1>
        </div>
        
        <br>
        <form id="form" method="post" action="{{ route('user.location.store') }}" >

            {{ csrf_field() }}

            <div class="col-md-12">
                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                    <label>@lang('common.enter_your_location'):</label>
                    <input type="text" name="location" class="form-control" id="pac-input" placeholder="Search Places..." value="{{ old('location') }}" >
                    @if($errors->has('location'))
                        <span class="help-block">{{ $errors->first('location') }}</span>
                    @endif
                </div>
                {{-- <div id="map"></div> --}}
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                    {{-- <label for="lat">Lat:</label> --}}
                    <input type="hidden" class="form-control input-sm" name="lat" id="lat" value="{{ old('lat') }}">
                    @if($errors->has('lat'))
                        <span class="help-block">{{ $errors->first('lat') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
                    {{-- <label for="lng">Lng:</label> --}}
                    <input type="hidden" class="form-control input-sm" name="lng" id="lng" value="{{ old('lng') }}">
                    @if($errors->has('lng'))
                        <span class="help-block">{{ $errors->first('lng') }}</span>
                    @endif
                </div>
            </div>

            


            <div class="col-md-12">
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
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
        src="https://maps.googleapis.com/maps/api/js?key={{ config('google.map.key') }}&libraries=places&v=3&callback=addUserLocation">
    </script>
    <script>
        $(document).keypress(
            function(event){
                if(event.which == 13){
                    event.preventDefault();
                }
            }
        )
        $('#getloction-btn').on('click', getloction)
        function getloction(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(onPositionRecieved, locationNotRecieved)
            }
        }

        function onPositionRecieved(position){
            console.log(position)
            $('#lat').val(position.coords.latitude)
            $('#lng').val(position.coords.longitude)

            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'location': {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                }
            }, function(results, status) {
                console.log(results);
                if (status === 'OK') {
                    if(results[1]){
                        $('#pac-input').val(results[1].formatted_address);
                        $('#form').submit();
                    }
                    
                }
            })

        }
        function locationNotRecieved(err){
            console.log(err)
        }
        

    </script>
@stop