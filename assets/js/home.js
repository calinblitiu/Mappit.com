 var pois = [];
 var myPos_latitude = 0;
 var myPos_longitude = 0;
 var map = null;
 var mapProp = null;
 var myMarker = null;
 var myCenter = null;
 var markers = [];
 var directionsService = null;
 var directionsDisplay = null;

 var currentObj = 0;
 var realtimeInterval = null;

 function getCurMyPos(){
 	if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(setCurMyPos);
    } else { 
        alert( "Geolocation is not supported by this browser.");
  }
 }

 function setCurMyPos(position) {
    myPos_longitude = position.coords.longitude;
    myPos_latitude = position.coords.latitude;

    $("#my_lat").html(myPos_latitude);
    $("#my_long").html(myPos_longitude); 
    
    myMarker.setPosition(new google.maps.LatLng(myPos_latitude, myPos_longitude));
	var my_pos = myMarker.getPosition();
	var first_pos = markers[currentObj].getPosition();
	calculateAndDisplayRoute({lat:parseFloat(pois[currentObj].poi_lat), lng: parseFloat(pois[currentObj].poi_long)})
    var distance = google.maps.geometry.spherical.computeDistanceBetween(my_pos, first_pos);
    $("#my_dist").html(distance);

    if(distance <= 30){
    	$("#playButton").show();
    	$("#poi_title").html("POI " + currentObj);
    	$("#playButton").data('poi-id', currentObj + 1);
    	if ((currentObj+1) >= pois.length){
    		clearInterval(realtimeInterval);
    		// alert("end");
    		return;
    	} else {
    		currentObj ++;	
    	}
    	
    }
}

 function getMyLocation () {
	if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(initMyPos);
	
    } else { 
        alert( "Geolocation is not supported by this browser.");
  }
}

function initMyPos(position) {
    myPos_longitude = position.coords.longitude;
    myPos_latitude = position.coords.latitude;

    $("#my_lat").html(myPos_latitude);
    $("#my_long").html(myPos_longitude);
    initMap();
}

function initMap(){
	directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
	
	myCenter = new google.maps.LatLng(myPos_latitude,myPos_longitude); 
	mapProp = {
	    center: myCenter,
	    zoom: 20,
	    gestureHandling: 'greedy',
	    scaleControl: true,
	    zoomControle: true
	};
	map = new google.maps.Map(document.getElementById("main-map"),mapProp);
	myMarker = new google.maps.Marker({
	    position: myCenter,
	    icon: baseURL + 'assets/images/my-pos-icon-20.png'
	});
	myMarker.setMap(map);
	directionsDisplay.setMap(map);

	// marker.position = new google.map.LatLng(myPos_latitude + 1, myPos_longitude +1);

	realtimeInterval = setInterval(getCurMyPos, 2000);
}

function myMap() {
	getMyLocation();
}

$.ajax({
	url: baseURL + 'ajax/getallpois',
	dataType: 'json',
	type: 'get'
}).done(function(data){
	pois = data;

	for(var i = 0; i<pois.length; i++){
		var poi = pois[i];

		var marker = new google.maps.Marker({
		    position: new google.maps.LatLng(poi.poi_lat, poi.poi_long),
		    icon: baseURL + 'assets/images/my-pos-icon-40.png'
		});
		marker.setMap(map);

		markers.push(marker);

	}
}).fail(function(){
	console.log('error')
});

function playMusic(poi_id) {
	var x = document.getElementById("mark-audio-" + poi_id); 
	x.play(); 
}

$("#playButton").click(function(){
	var poi_id = $(this).data('poi-id') - 1;
	playMusic(pois[poi_id].poi_id);
	$(this).hide();
});

function calculateAndDisplayRoute(destination) {
        directionsService.route({
          origin: {lat: parseFloat(myPos_latitude), lng: parseFloat(myPos_longitude)},
          destination: destination,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            // window.alert('Directions request failed due to ' + status);
            console.log('Directions request failed due to ' + status);
          }
        });
      }