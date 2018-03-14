 var pois = null;
 var myPos_latitude = 0;
 var myPos_longitude = 0;

 $(function() {
    function initMap() {
	    $("#main-map").googleMap({
	      zoom: 15, // Initial zoom level (optional)
	      coords: [myPos_latitude, myPos_longitude], // Map center (optional)
	      type: "ROADMAP", // Map type (optional),
	      scrollwheel: true,
	    });

	    $("#main-map").addMarker({
	    	 coords: [myPos_latitude, myPos_longitude],
	    	 icon: baseURL + 'assets/images/my-pos-icon-20.png',
	    	 title: 'My Location',
	    	 text: 'My Location'
	    });
    }
    

	function getMyLocation () {
		if(navigator.geolocation){
	        navigator.geolocation.getCurrentPosition(showPosition);
		
	    } else { 
	        alert( "Geolocation is not supported by this browser.");
	  }
	}

	function showPosition(position) {
	    // x.innerHTML = "Latitude: " + position.coords.latitude + 
	    // "<br>Longitude: " + position.coords.longitude;

	    myPos_longitude = position.coords.longitude;
	    myPos_latitude = position.coords.latitude;
	    initMap();
	}

	getMyLocation();
    
    $.ajax({
    	url: baseURL + 'ajax/getallpois',
    	dataType: 'json',
    	type: 'get'
    }).done(function(data){
    	pois = data;
    	
    }).fail(function(){
    	console.log('error')
    });


  });