// JavaScript Document

var x = document.getElementById("location");

function getCurrentLocation() {
    if (navigator.geolocation) {
		document.getElementById("button").disabled = true; 
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
	var lat = position.coords.latitude;
	var lon = position.coords.longitude;
	document.getElementById('lat').value= lat;
	document.getElementById('lon').value= lon;
	document.getElementById("button").disabled = false; 
}

