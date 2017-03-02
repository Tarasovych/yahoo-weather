<?php   
    $query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$_POST['city'].', ak")';
    $api_request = "http://query.yahooapis.com/v1/public/yql?q=" . urlencode($query) . "&format=json";
    $result = file_get_contents($api_request);
    $result_decode = json_decode($result);
    $description = $result_decode->query->results->channel->item->description;
	$weather = stristr($description,']]>',true);
?>    

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<form id="form" name="cityform" action="" method="post">
		City<br>
  		<input type="text" name="city" required="true" value="">
  		<input type="submit" value="Submit" onclick="showWeather()">
	</form>
	<div id="weather_for">
		<?php echo 'Weather for: ' . $_POST['city']; ?>
	</div>
	<div id="weather_city">
		<?php echo $weather ?>		
	</div>
</body>
</html>

<!-- 
js
? приховати закоментоване trim/array_search/frontend
weather for лишається назва міста 
-->
