<?php session_start();

 	$link = mysqli_connect("localhost","root","","amazoncopycat") or die(mysql_error());
 	$review = $_POST["review"];


 	$review=htmlentities($link->real_escape_string($review));


 	$query = "Insert into book_review (BOOK_ID, USER_ID,RATING,REVIEW_TEXT) values ('1234,1,4,'This is a great story')";
 	echo $query;
 	$result = mysqli_query($link,$query);


 	header('Location: bookshelf.php');




?> 