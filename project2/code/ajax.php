<?php

	//===========================
	//	Database connections
	//===========================	
	$mysqli = new mysqli('localhost', 'root', '', 'amazoncopycat'); //host, username, password, DB

	if ($mysqli->connect_error) {
		die('Connect Error (' . $mysqli->connect_errno . ') '
				. $mysqli->connect_error);
	}
	//===========================

	
	
	$id = $mysqli->real_escape_string($_POST["bookid"]); 
	


	$userid=2;  //this needs to point to the EMAIL of your record in users table so make sure we change both
	//the value in the insert statement and the $userid stuff to the cookie we set in log-in

	
	
	$result = $mysqli->query("INSERT into checkedout (ID_BOOK, ID_USER) VALUES ('$id', '$userid')") ;   // i am 95% certain the double quoted with '$id' will work.  otherwise 
	// we also might want to change this to query the database for users, check if the user is already in here
	//and then if they are just update their product list & append the new book
	//and if they are aren't in the table (new user maybe, first book in cart) then we insert a new row

	if(!$result)
		echo $mysqli->connect_error;
	

?>
