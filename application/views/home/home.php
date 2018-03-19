<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/home.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var baseURL = "<?=base_url()?>";
	</script>
</head>
<body>
	<img src="<?=base_url()?>assets/images/my-pos-icon-20.png" style="display: none;">
	<img src="<?=base_url()?>assets/images/my-pos-icon-40.png" style="display: none;">
	<div class="header">
		<a href="<?=base_url()?>" style="height: 100%;">

		<img src="<?=base_url()?>assets/images/logo.png" style="height: 100%;">
		</a>
	</div>
	<div style="">

		<?php
			foreach ($pois as $poi) {
				if ($poi->poi_mp3 != ""){
				?>
				<audio id="mark-audio-<?=$poi->poi_id?>" >
				  <source src="<?=base_url()?>uploads/<?=$poi->poi_mp3?>" type="audio/mpeg">
				</audio>

				<?php
				}
				if ($poi->poi_mp3_fr != ""){
				?>
				<audio id="mark-audio-<?=$poi->poi_id?>-fr" >
				  <source src="<?=base_url()?>uploads/<?=$poi->poi_mp3_fr?>" type="audio/mpeg">
				</audio>

				<?php
				}
				if ($poi->poi_mp3_nl != ""){
				?>
				<audio id="mark-audio-<?=$poi->poi_id?>-nl" >
				  <source src="<?=base_url()?>uploads/<?=$poi->poi_mp3_nl?>" type="audio/mpeg">
				</audio>

				<?php
				}
				if ($poi->poi_mp3_uk != ""){
				?>
				<audio id="mark-audio-<?=$poi->poi_id?>-gb" >
				  <source src="<?=base_url()?>uploads/<?=$poi->poi_mp3_uk?>" type="audio/mpeg">
				</audio>

				<?php
				}
			}
		?>
	</div>

	<div class="content" >
		<div style="width: 100%; height: 100%;" id="main-map"></div>
		<button id="playButton" data-poi-id="">Play Sound : <span id="poi_title"></span></button>
	</div>

	<div class="footer">
		<div id="route-guide">
			<h4>Votre position</h4>
			<div class="routes" id="routes">
			</div>
		</div>

		<div id="select-travel-way">
			<h4>Select your way of travel</h4>
			
				<div class="way-containter">
					<span class="way-item" data-travel-mode="DRIVING"><i class="fas fa-car"></i></span>
					<span class="way-item" data-travel-mode="TRANSIT"><i class="fas fa-bus"></i></i></span>
					<span class="way-item" data-travel-mode="WALKING"><i class="fas fa-street-view"></i></span>
					<span class="way-item" data-travel-mode="BICYCLING"><i class="fas fa-bicycle"></i></span>
				</div> 
			
		</div>
	</div>

	<div style="position: absolute;bottom: 0;right: 0; width: 200px;height: 200px;background: #000; color: white;padding: 10px; border-radius: 5px; overflow: scroll;display: none;">
		<p>Lat: <span id="my_lat"></span></p>
		<p>Long: <span id="my_long"></span></p>
		<p>distance: <span id="my_dist"></span></p>
		<div id="directions"></div>
	</div>

	<div id="loading-div">
		<div class="loading-content">
			<img src="<?=base_url()?>assets/images/loading.gif" class="loading-gif">
			<p>Waiting for localization</p>

		</div>
	</div>

	<div id="calculating-div">
		<div class="calculating-content">
			<img src="<?=base_url()?>assets/images/loading.gif" class="calculating-gif">
			<p>Calculating route to your POI</p>
		</div>
	</div>

	<script type="text/javascript" src="<?=base_url()?>assets/js/home.js"></script>
	<script  async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=true&key=AIzaSyB4aBzOIeSyU2zYZgiLJkq9j5cxy5uN8Jw&callback=myMap"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
</body>
</html>