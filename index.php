<?php
/**
 * OOP PHP Class
 * @category		IP Trace
 * @author			Sohel Amin
 * @email			sohelamincse@gmail.com
 * @author url		http://www.sohelamin.com
 * @company url		http://www.appzcoder.com
 */
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();
//$ip=$_SERVER['REMOTE_ADDR'];
$geoplugin->locate('180.234.28.15');

//locate the IP If you leave the ip from param then it will trace your ip.
//$geoplugin->locate();

echo "Geolocation results for {$geoplugin->ip}: <br />\n".
	"City: {$geoplugin->city} <br />\n".
	"Region: {$geoplugin->region} <br />\n".
	"Area Code: {$geoplugin->areaCode} <br />\n".
	"Country Name: {$geoplugin->countryName} <br />\n".
	"Country Code: {$geoplugin->countryCode} <br />\n".
	"Longitude: {$geoplugin->longitude} <br />\n".
	"Latitude: {$geoplugin->latitude} <br />\n".
	"Currency Code: {$geoplugin->currencyCode} <br />\n".
	"Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
	"Exchange Rate: {$geoplugin->currencyConverter} <br />\n";

$nearby = $geoplugin->nearby();

if ( isset($nearby[0]['geoplugin_place']) ) {

	echo "<pre><p>Some places you may wish to visit near " . $geoplugin->city . ": </p>\n";

	foreach ( $nearby as $key => $array ) {
		
		echo ($key + 1) .":<br />";
		echo "\t Place: " . $array['geoplugin_place'] . "<br />";
		echo "\t Region: " . $array['geoplugin_region'] . "<br />";
		echo "\t Latitude: " . $array['geoplugin_latitude'] . "<br />";
		echo "\t Longitude: " . $array['geoplugin_longitude'] . "<br />";
	}
	echo "</pre>\n";
}

?>
