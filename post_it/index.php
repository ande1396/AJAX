<?php
include('connection.php');

?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Notes Page</title>
	<link rel="stylesheet" type="text/css" href="ajax1.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link rel="stylesheet" media="all" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

	<script type="text/javascript">

	$(document).ready(function()
	{	
		$('.form').submit(function()
		{
			$.post(//needs 4 peices of data
				$(this).attr('action'),//lcation of where the form is going to
				  $(this).serialize(),// data from the form, what data do we send to the location from the form, erialized string 

				  function(response)//call back function, response is a catcher, catch what php sent us from the process page , catch the html string. ie the new note, in this case (note always a html string) 
				  {
				  	console.log(response); //see on the element what it is sending out 
				  	$("#results").html(response.notes)//go to the results div and give it the html string from above, could do .append as well ; response is what u put on the json encode line ; going to alter the html, from response.notes, from other page,
				  		//$("#results").text(response.notes) 
				  		$('#message').val("");
				  }
				  ,"json");
			return false;//stays on the page, dont want to refresh it 
		});

		$('.form').submit(); //defines the function first, then calls it 

	})


	</script>
</head>
	<body>
		<div id="wrapper">
			<h1>My Posts:</h1>
			<div id="results"> <!-- this results goes to the jquery above-->
			</div>

			<div "add_note">
				<h4 id="x">Add a note: </h4>
				<form class="form" action="process.php" method="post">
					<textarea id="message" name="message" rows='10' cols='30'></textarea><br>
					<input type='submit' value='Post It!'>

				</form> 
			</div>
			
		</div><!--end of wrapper --> 

	</body>
</html>
