<?php
include('connection.php');

	if(isset($_POST))
	{
		if(!empty($_POST['message'])) // if post is eet and not empty
		{
			add_note(); // run the function
		}
		// start with get_notes(go there)
		$data['notes'] = good_notes(get_notes()); /// goes to the other page , key and value 
		echo json_encode($data);
	}

//can pass whatever in good_notes through $notes
function good_notes($notes)
{
	$html = ""; // starts out as empty
	foreach ($notes as $note)
	{
		
		$html .= "<div class='note'>" . $note['description'] . "</div>";
	}
	return $html; //returns html which eas blank, for every note make a new div


}


function get_notes()
{
	$query_1 = "SELECT * FROM posts";
	// echo $query;
	// die(); 
	return fetchALL($query_1); //gets everything from notes, returns is back to get notes
}



function add_note() 
{

	$query = "INSERT INTO posts (description, created_at, updated_at) VALUES ('{$_POST['message']}', NOW(), NOW())";  
	mysql_query($query);

	//funcntion add note from above, if tere is a message, it will send it to the database through the query. will then go to the next part after the curley brace above. 


}




?> 
