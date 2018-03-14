<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/home.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4aBzOIeSyU2zYZgiLJkq9j5cxy5uN8Jw"></script> -->
	<!-- <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.googlemap.js"></script> -->
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

	<div class="content" >
		<div style="width: 100%; height: 100%;" id="main-map"></div>
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

	<script type="text/javascript" src="<?=base_url()?>assets/js/home.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4aBzOIeSyU2zYZgiLJkq9j5cxy5uN8Jw&callback=myMap"></script>
</body>
</html>