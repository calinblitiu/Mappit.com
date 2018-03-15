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
			}
		?>
	</div>

	<div class="content" >
		<div style="width: 100%; height: 100%;" id="main-map"></div>
		<button id="playButton" data-poi-id="">Play Sound : <span id="poi_title"></span></button>
	</div>

	<div class="footer">
		
		<h3>Votre position</h3>
		<div style="display: flex;">
			<i class="glyphicon glyphicon-chevron-right"></i>
			<div class="" style="padding-left: 10px; width: 100%;">
				<h4 style="margin-top: 0;">Predre  rue de asldkjf a</h4>
				<h4>Predre  rue de asldkjf a</h4>
				<div style="display: flex;align-items: center;width: 100%;">
					<span class="text-muted">53s(260m)</span>
					<div style="width: 100%;border-bottom: solid 1px #888;margin: 0 10px;"></div>
				</div>
			</div>
		</div>
	</div>

	<div style="position: absolute;bottom: 0;right: 0; width: 200px;height: 200px;background: #000; color: white;padding: 10px; border-radius: 5px;">
		<p>Lat: <span id="my_lat"></span></p>
		<p>Long: <span id="my_long"></span></p>
		<p>distance: <span id="my_dist"></span></p>
	</div>

	<script type="text/javascript" src="<?=base_url()?>assets/js/home.js"></script>
		<script  async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=true&key=AIzaSyB4aBzOIeSyU2zYZgiLJkq9j5cxy5uN8Jw&callback=myMap"></script>
</body>
</html>