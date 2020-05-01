function initMap() {
	var uluru = {lat: 19.042608, lng:  72.864204};
	var map = new google.maps.Map(document.getElementById('map'), {zoom: 18, center: uluru});
	var marker = new google.maps.Marker({position: uluru, map: map});
}
function setMarker(lat, lng){
	if(!isNaN(lat) && !isNaN(lng)){
		lat = lat/1;
		lng = lng/1;
		var uluru = {lat: lat, lng: lng};
	    var map = new google.maps.Map(
	      document.getElementById('map'), {zoom: 15, center: uluru});
	    var marker = new google.maps.Marker({position: uluru, map: map});
	}
}

function requestNewLocation(id, type){
	data = {};
	data['id']=id;
	data['type']=type;
	showLoadingModal();
	$.post("../ajax/geo/requestLatestGeoLocation.php",data, function(returnData){
		updateMap(data);
		setTimeout(function(){hideLoadingModal();},10000);
	});
	setTimeout(function(){hideLoadingModal();},20000);
}

function updateMap(data){
	timeStamp = (new Date()).getTime();
	$.post("../ajax/geo/getLatestGeoLocation.php?"+timeStamp,data,function(data){
		try{
			jsonObj = JSON.parse(data);	
			if(typeof(jsonObj.status) != "undefined" && jsonObj.status == "success"){
				lat = jsonObj.lat;
				lng = jsonObj.lng;
				setMarker(lat, lng);
				time = jsonObj.time;
				$("#geoTime").text(time);
			} else if(typeof(jsonObj.status) != "undefined" && jsonObj.status == "failed"){
				$("#geoTime").text("No Geo-Locatin Detail Available");
			}
		}catch(e){
			concole.error(e);
		}
	});
}

function updateGeoMap(id, type){
	data = {};
	data['id']=id;
	data['type']=type;
	updateMap(data);
	var timerClock = setInterval(function() {
		updateMap(data);
	}, 15000);
}