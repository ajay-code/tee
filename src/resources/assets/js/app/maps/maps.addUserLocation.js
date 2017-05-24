window.addUserLocation = function(){
    var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));

    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;

        _.each(places, (place)=>{
            console.log(place.geometry.location);  
            $('#lat').val(place.geometry.location.lat())
            $('#lng').val(place.geometry.location.lng())      
        });

    });

    

}