<?php

// get your ip address
if (getenv('HTTP_CLIENT_IP')) {
		$ip = getenv('HTTP_CLIENT_IP');
	}
	elseif (getenv('HTTP_X_FORWARDED_FOR')) {
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	}
	elseif (getenv('HTTP_X_FORWARDED')) {
		$ip = getenv('HTTP_X_FORWARDED');
	}
	elseif (getenv('HTTP_FORWARDED_FOR')) {
		$ip = getenv('HTTP_FORWARDED_FOR');
	}
	elseif (getenv('HTTP_FORWARDED')) {
		$ip = getenv('HTTP_FORWARDED');
	}
	else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$_SESSION["ip"] = $ip;
	
// include geo ip scripts
include("geoip.inc");
include("geoipcity.inc");
include("geoipregionvars.php");

try {
	// open binary copy of geoip database
	// latest copy available for free at: http://dev.maxmind.com/geoip/geolite
	$gi = geoip_open("GeoLiteCity.dat",GEOIP_STANDARD);
	
		// get record using ip address
	   $record = geoip_record_by_addr($gi,$ip);
	   
	   // get geoip values
	   $country = $record->country_name;
	   $city = $record->city;
	   $lat = $record->latitude;
	   $long = $record->longitude;
	   
	   // close geoip
	   geoip_close($gi);		   
}
catch(Exception $e) {
		// if geoip doesn't work, set variables to blank
	   $country = '';
	   $city = '';
	   $lat = '';
	   $long = '';                                   
}

echo 'country: '.$country;
echo '<br>city: '.$city;
echo '<br>lat: '.$lat;
echo '<br>long: '.$long;
	

?>