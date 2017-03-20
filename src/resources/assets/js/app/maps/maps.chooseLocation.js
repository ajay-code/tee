window.chooseLocation = function(){
	let map = new google.maps.Map(document.getElementById('map'),{
		center: {
            lat: 54.5259614,
            lng: 15.255118700000025
        },
        zoom: 3,
        mapTypeId: google.maps.MapTypeId.ROADMAP
	});
    let bounds = new google.maps.LatLngBounds();
    let markers = [];

    axios.get(url.clubs).then(res=>{
        let clubs = res.data
        _.each(clubs, (club)=>{
           clubLatLng = new google.maps.LatLng(club.lat, club.lng);
           let marker = new google.maps.Marker({
                position: clubLatLng,
                map: map,
                location: club.location,
                id: club.id,
                title: club.location,
                animation: google.maps.Animation.DROP,
                icon: flag
            });
           bounds.extend(clubLatLng);
           markers.push(marker);
        });
    }).then(()=>{
        if(!bounds.isEmpty()){
            map.fitBounds(bounds);
            map.setCenter(bounds.getCenter());
        }
        _.each(markers, (marker) =>{
            marker.addListener('click', ()=>{
                    var lat = marker.getPosition().lat();
                    var lng = marker.getPosition().lng();
                    $('#lat').val(lat);
                    $('#lng').val(lng);
                    $('#location').val(marker.location);
                    $('#club-id').val(marker.id);
                    // recenter the map to the marker and zoom
                    map.panTo(marker.getPosition());
                    map.setZoom(10);
            })
        })
    });

}
