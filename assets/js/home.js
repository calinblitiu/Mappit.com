 var pois = null;

 $(function() {
    function initMap() {
	    $("#main-map").googleMap({
	      zoom: 30, // Initial zoom level (optional)
	      coords: [48.895651, 2.290569], // Map center (optional)
	      type: "ROADMAP", // Map type (optional),
	      scrollwheel: true,
	    });
    }
    

    $.ajax({
    	url: baseURL + 'ajax/getallpois',
    	dataType: 'json',
    	type: 'get'
    }).done(function(data){
    	pois = data;
    	initMap();
    }).fail(function(){
    	console.log('error')
    })
  })