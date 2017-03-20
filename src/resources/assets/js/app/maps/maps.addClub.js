window.initMap = function(){
	let map = new google.maps.Map(document.getElementById('map'),{
		center: {
            lat: 54.5259614,
            lng: 15.255118700000025
        },
        zoom: 3,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
	});

	let marker = new google.maps.Marker({
        position: {
            lat: 54.5259614,
            lng: 15.255118700000025
        },
        map: map,
        animation: google.maps.Animation.DROP,
        icon: flag,
        draggable: true
    });

    var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));

    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;

        _.each(places, (place)=>{
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);            
        });

        if(!bounds.isEmpty()){
            map.fitBounds(bounds);
            map.setCenter(bounds.getCenter());
        }
        map.setZoom(12);

    });

    google.maps.event.addListener(marker, 'position_changed', function() {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        $('#lat').val(lat);
        $('#lng').val(lng);
    });
}