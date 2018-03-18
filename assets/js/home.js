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

 var getCountryNameInterval = null;
 var country_code = '';
 var shortest_markerID = 0;

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

    if(distance <= 100){
    	$("#playButton").show();
    	$("#poi_title").html("POI " + currentObj+1);
    	$("#playButton").data('poi-id', currentObj + 1);
    	clearInterval(realtimeInterval);
    	currentObj ++;
    }
}

function getShortestPoi(){
    if (myMarker == null) {
        alert("Your location is failed Please reload page");
        return;
    }
    var my_pos = myMarker.getPosition();
    var first_pos = markers[0].getPosition();
    var shortest_length = google.maps.geometry.spherical.computeDistanceBetween(my_pos, first_pos);
    for (var  i = 1; i < markers.length; i++) {
        var temp_pos = markers[0].getPosition();
        var temp_length = google.maps.geometry.spherical.computeDistanceBetween(my_pos, first_pos);
        if (temp_length < shortest_length){
            shortest_markerID = i;
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
	    icon: baseURL + 'assets/images/my-pos-icon-20.png',
        animation: google.maps.Animation.DROP,
	});
	myMarker.setMap(map);
	directionsDisplay.setMap(map);
	directionsDisplay.setOptions({suppressMarkers: true});

	// marker.position = new google.map.LatLng(myPos_latitude + 1, myPos_longitude +1);

	realtimeInterval = setInterval(getCurMyPos, 5000);
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
		    icon: baseURL + 'assets/images/my-pos-icon-40.png',
		    title: poi.poi_address,
            animation: google.maps.Animation.DROP,
		});
		marker.setMap(map);

		marker.addListener('click', function() {
          infowindow.open(map, marker);
        });


		var content = `<h3>`+poi.poi_name + `(`+ poi.poi_address+`)</h3><div>`+poi.poi_description+`</div>`;

		var infowindow = new google.maps.InfoWindow()

		google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
	        return function() {
	           infowindow.setContent(content);
	           infowindow.open(map,marker);
	        };
	    })(marker,content,infowindow)); 

		markers.push(marker);

	}

    getShortestPoi();
}).fail(function(){
	console.log('error')
});

function playMusic(poi_id) {
	var x = document.getElementById("mark-audio-" + poi_id); 
	x.play();
	x.onended = function(){
		if (currentObj >= pois.length){
			window.location = baseURL + 'welcome';
		} else{
			realtimeInterval = setInterval(getCurMyPos, 5000);
		}
		
	}
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
            // $("#directions").html(JSON.stringify(response));
            // console.log(response.routes);
            // alert(response)
            var routes = response.routes;
            var routes_html = $("#routes");
             routes_html.html("");

             for(var i_routes = 0; i_routes< routes.length; i_routes++){
             	// routes_html.append("");
             	var legs = routes[i_routes].legs;
             	// console.log(legs);
             	for (var i_legs = 0; i_legs < legs.length; i_legs ++){
             		var leg = legs[i_legs];
             		console.log(leg);

             		var detail_guid_infos = "";
             		var steps = leg.steps;
             		for(var i_steps = 0; i_steps< steps.length; i_steps++){
             			var step = steps[i_steps];

             			detail_guid_infos += `<div class="detail-guide-info">`;

             			if (step.maneuver == ""){
             				detail_guid_infos += `<i class="glyphicon glyphicon-arrow-up direction-icon"></i>`;
             			} else if (step.maneuver == "turn-right") {
             				detail_guid_infos += `<img class="direction-icon" src="/assets/images/turn-right-icon.png">`;
             			} else if(step.maneuver == "turn-left") {
             				detail_guid_infos += `<img class="direction-icon" src="/assets/images/turn-left-icon.png">`;
             			}
             			detail_guid_infos += `<div class="instruction">` + step.instructions + `<span class="text-muted">`+ step.duration.text + `(` +step.distance.text+`)</span></div>`;
             			detail_guid_infos += `</div>`;
             		}

             		routes_html.append(`
             			<div class="route-item">
							<div class="route-content">
								<i class="glyphicon glyphicon-chevron-right"></i>
								<div class="route-content-div">
									<h4 class="start-place">`+leg.start_address+`</h4>
									<h4 class="end-place">`+leg.end_address+`</h4>
									` + detail_guid_infos + `
									<div class="distance-duration">
										<span class="text-muted dis-dur">`+leg.duration.text+`(`+leg.distance.text+`)</span>
										<div class="middle-line"></div>
									</div>
								</div>
							</div>
						</div>
             		`);
             	}
             }
          } else {
            // window.alert('Directions request failed due to ' + status);
            console.log('Directions request failed due to ' + status);
          }
        });
      }

// $("#loading-div").hide();

function getCountryFunction()
{
    $.ajax({
        url: 'https://ipinfo.io/json',
        dataType: 'json',

    }).done(function (data){
        clearInterval(getCountryNameInterval); 
        $("#loading-div").hide();
        country_code = data.country.toLowerCase();  

    }).fail(function(){
        alert("Your Location Is not provided. Please reload the page");
    });
}

getCountryFunction();