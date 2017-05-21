@extends('layouts.app') @section('content')
<div class="container">
    <div class="row profile">
        <div class="col-sm-12 {{-- col-md-9 --}}">
            <div id="map"></div>
            <div class="panel panel-default">
                <div class="profile__detail">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h4>Users</h4>
                            <div class="table-responsive">
                                <table class="table table-responsive table-user-information">
                                    <tbody>
                                        @foreach ($locations as $location)
                                        <tr class="gray">
                                            <td>
                                                <strong>
                                            <img src="{{ $location->user->thumbnail() }}" alt="">
                                            <a href="{{ route('other.user.profile', ['user' => $location->user->id]) }}">{{ $location->user->firstname }}</a>
                                        </strong>
                                            </td>
                                            <td class="text-primary">
                                                <span class="pull-right">
                                                    Within  {{ round($location->distance) }}km
                                                </span>
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
</div>
@stop 

@section('scripts')
<script>
    window.locations = {!! json_encode($locations) !!}
    window.storageUrl = '{{ getStorageUrl() }}';
    console.log(locations, storageUrl);
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('google.map.key') }}&libraries=places&v=3&callback=findFriendsByLocation">
</script>
@stop
