<html>
	<head>
		<title>Weather</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">

		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function()
		{
			$("form").submit(function()
			{
			$.get($(this).attr('action')+ '?callback=?', $(this).serialize(), function(dojo)
			{
				console.log(dojo);
				var temp = dojo.data.current_condition[0].temp_F;
				$('#forecast').text("The Current Temperature is: " + temp + " degrees");
			}, 'json');
			return false;
		});
      });

			
		</script>
		<style>
		</style>
	</head>
	<body>
		<h2>The Weather Report!</h2>
		<form  class="form col-md-4" role="form" id="form" action='http://api.worldweatheronline.com/free/v1/weather.ashx' method='get'> 
		<select name='q'>
				<option value='94303'>Mountain View</option>
				<option value='98005'>Seattle</option>
				<option value='77005'>Houston</option>
			</select>	
			<input type='hidden' name = 'key' value='jtpc4myth9fwxjgwz9fh5fw5'>
			<input type='hidden' name = 'format' value='json'>
			<input type='submit' class="btn btn-primary" value="Get Weather Now">
		</form> 

		<div id='forecast'></div> 
	</body>
	</html>