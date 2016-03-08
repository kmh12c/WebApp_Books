<?php

	//===========================
	//	Database connections
	//===========================	
	$mysqli = new mysqli('localhost', 'root', '', 'checkedout'); //host, username, password, DB

	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '
				. $mysqli->connect_error);
	}
	//===========================

	$response = "";
	
	$id = $mysqli->real_escape_string($_GET["bid"]);
	$userid='jamie'

	
	
	$result = $mysqli->query("INSERT Values (BOOK_ID, USER_ID) VALUES ('".$id."', '".userid"')";
	if(!$result)
		$response = "Can't use query last name because: " . $mysqli->connect_errno . ':' . $mysqli->connect_error;
	

?>