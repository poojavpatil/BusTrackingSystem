var map;
var directionsService;
var directionsDisplay ;	
function initMap() {
	var uluru = {lat: 19.042608, lng:  72.864204};
	map = new google.maps.Map(document.getElementById('map'), {zoom: 18, center: uluru});
	directionsService = new google.maps.DirectionsService();
	directionsDisplay = new google.maps.DirectionsRenderer();
	directionsDisplay.setMap(map);
	//var marker = new google.maps.Marker({position: uluru, map: map});
	//setTimeout(function(){$("#map").attr("style","")},1000);
}

 function calcRoute1() {
        var datapoint=[];
		var startpoint=null;
		var endpoint=null;
		$("[data-type='busstop']").each(function(){
			var lat=$(this).find("[data-type='latitude']").text().trim()/1;
			var lng=$(this).find("[data-type='longitude']").text().trim()/1;
			var mappoint={"lat":lat,"lng":lng};
			datapoint.push(mappoint);
			if(startpoint==null)
				startpoint=mappoint;
			endpoint=mappoint;
			var marker = new google.maps.Marker({position: mappoint, map: map});
		});
		
		var start = new google.maps.LatLng(startpoint['lat'], startpoint['lng']);
        //var end = new google.maps.LatLng(38.334818, -181.884886);
        var end = new google.maps.LatLng(endpoint['lat'], endpoint['lng']);
        /*
var startMarker = new google.maps.Marker({
            position: start,
            map: map,
            draggable: true
        });
        var endMarker = new google.maps.Marker({
            position: end,
            map: map,
            draggable: true
        });
*/
        var bounds = new google.maps.LatLngBounds();
		var latLangPoints = [];
		var wayPoints = [];
        //bounds.extend(start);
        //bounds.extend(end);
		for(i=0;i<datapoint.length;i++){
			latlangPoint = new google.maps.LatLng(datapoint[i]['lat'], datapoint[i]['lng'])
			bounds.extend(latlangPoint);
			latLangPoints.push(latlangPoint);
			wayPoints.push({location: latlangPoint, stopover: false})
		}
		
		
		
		
        map.fitBounds(bounds);
        var request = {
            origin: start,
            destination: end,
			waypoints : wayPoints,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);
            } else {
                alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
            }
        });
    }
//$(document).ready(function(){
	setTimeout(function(){
		calcRoute1();
	},4000);
		
//});
// mapLocation();