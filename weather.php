<?php   
    $query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$_POST['city'].', ak")';
    $api_request = "http://query.yahooapis.com/v1/public/yql?q=" . urlencode($query) . "&format=json";
    $result = file_get_contents($api_request);
    $result_decode = json_decode($result);
    // echo '<pre>' . var_export($result_decode->query->results->channel->item->description, true) . '</pre>';
?>    

<html>
<head>
	<!-- <script type="text/javascript">
		function showWeather() {
   		document.getElementById('weather_city').style.display = "block";
		}
	</script> -->
</head>
<body>
	<form id="form" name="cityform" action="" method="post">
		City<br>
  		<input type="text" name="city">
  		<input type="submit" value="Submit" onclick="showWeather()">
	</form>
	<div id="weather_for">
		<?php echo 'Weather for ' . $_POST['city']; ?>
	</div>
	<div id="weather_city" style="display: none;"">
		<?php echo '<pre>' . var_export($result_decode->query->results->channel->item->description, true) . '</pre>' ?>
	</div>
</body>
</html>

