<?php
	//===========================
	//	Database connections
	//===========================	
	$mysqli = new mysqli('localhost', 'sMove', '', 'amazoncopycat'); //host, username, password, DB

	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '
				. $mysqli->connect_error);
	}
	//===========================

	$id = $mysqli->real_escape_string($_POST["bookid"]); 
	$type = $_POST["type"]; 
	$userid = $_POST["userid"]; 
		
	$result = $mysqli->query("INSERT into " . $type . " (id, user) VALUES ('$id', '$userid')") ; 

	if(!$result)
		echo $mysqli->connect_error;
?>