window.findFriendsByLocation = function(){
	let map = new google.maps.Map(document.getElementById('map'),{
		center: {
            lat: 54.5259614,
            lng: 15.255118700000025
        },
        zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP
	});
    let bounds = new google.maps.LatLngBounds();
    let markers = [];
    let infowindow = new google.maps.InfoWindow({maxWidth: 250});
    
    _.each(locations, (location)=>{
       let user = location.user;
       clubLatLng = new google.maps.LatLng(location.lat, location.lng);
       let photo = storageUrl + '/avatar/' + location.user.avatar;
       let thumbnail = storageUrl + '/avatar/tn-' + location.user.avatar;
       let marker = new google.maps.Marker({
            position: clubLatLng,
            map: map,
            location: location.location,
            id: location.id,
            title: location.location,
            animation: google.maps.Animation.DROP,
            icon: thumbnail
        });
       bounds.extend(clubLatLng);
       markers.push(marker);

       let content = `<div id="iw-container"> 
                        <div class="iw-title text-center">${user.name}</div> 
                        <div class="iw-content"> 
                          <img class="profile-thumbnail" src="${photo}" alt="${user.name}" height="120"> 
                          <div class="text-center">
                            <p><strong class="bold">Within</strong> ${Math.round(location.distance)}Km</p>
                            <p><a href="${'/users/' + user.id}" class="btn btn-success "> Visit Profile</a></p>
                          </div>
                        </div> 
                    </div>`

       google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
            return function() {
                infowindow.setContent(content);
                infowindow.open(map,marker);
                // windows.push(infowindow)
                google.maps.event.addListener(map,'click', function(){ 
                    infowindow.close();
                }); 
            };
        })(marker,content,infowindow)); 

    });

    if(markers.length == 1){
        map.setCenter(bounds.getCenter());
        map.setZoom(3)
    }
    else if(!bounds.isEmpty()){
        map.fitBounds(bounds);
        map.setCenter(bounds.getCenter());
	}
   

  // *
  // START INFOWINDOW CUSTOMIZE.
  // The google.maps.event.addListener() event expects
  // the creation of the infowindow HTML structure 'domready'
  // and before the opening of the infowindow, defined styles are applied.
  // *
  google.maps.event.addListener(infowindow, 'domready', function() {

        // Reference to the DIV that wraps the bottom of infowindow
        var iwOuter = $('.gm-style-iw');

        /* Since this div is in a position prior to .gm-div style-iw.
         * We use jQuery and create a iwBackground variable,
         * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
        */
        var iwBackground = iwOuter.prev();

        // Removes background shadow DIV
        iwBackground.children(':nth-child(2)').css({'display' : 'none'});

        // Removes white background DIV
        iwBackground.children(':nth-child(4)').css({'display' : 'none'});

        // Moves the infowindow 115px to the right.
        iwOuter.parent().parent().css({left: '64px'});

        // Moves the shadow of the arrow 76px to the left margin.
        iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

        // Moves the arrow 76px to the left margin.
        iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

        // Changes the desired tail shadow color.
        iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

        // Reference to the div that groups the close button elements.
        var iwCloseBtn = iwOuter.next();

        // Apply the desired effect to the close button
        iwCloseBtn.css({height: '26px', width: '27px',opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});

        // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
        if($('.iw-content').height() < 140){
          $('.iw-bottom-gradient').css({display: 'none'});
        }

        // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
        iwCloseBtn.mouseout(function(){
          $(this).css({opacity: '1'});
        });
      });
    
}
