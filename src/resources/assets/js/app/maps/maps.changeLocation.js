window.changeLocation = function(){
    let map = new google.maps.Map(document.getElementById('map'),{
        center: {
            lat: 54.5259614,
            lng: 15.255118700000025
        },
        zoom: 3,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
    });


    console.log(url.userLocation);

    axios.get(url.userLocation).then((res)=> {
        mark = res.data[0];
        console.log(mark);
        marker = new google.maps.Marker({
            position: {
                lat: mark.lat,
                lng: mark.lng
            },
            map: map,
            animation: google.maps.Animation.DROP,
            icon: flag,
            draggable: true
        });

        $('#pac-input').val(mark.location);

        map.setCenter(marker.getPosition());

    }).then(() => {
        google.maps.event.addListener(marker, 'position_changed', function() {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);
        });

        $('#find').on('click', function(e) {
            e.preventDefault();
            position = {
                lat : parseFloat($('#lat').val()),
                lng : parseFloat($('#lng').val())
            }
            console.log(position);

            marker.setPosition(position);
            map.setCenter(position); 
            map.setZoom(12);
        });
    })
    

    var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));

    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;

        _.each(places, (place)=>{
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);        
            console.log(place.geometry.location);   
        });

        if(!bounds.isEmpty()){
            map.fitBounds(bounds);
            map.setCenter(bounds.getCenter());
        }
        map.setZoom(12);

    });

    

    
    
}