<?php session_start();

 	$link = mysqli_connect("localhost","root","","amazoncopycat") or die(mysql_error());
    //$link = mysqli_connect("localhost","sMove","","amazoncopycat") or die(mysql_error()); //server connections

 	$isbn = $_POST["bookISBN"];
 	$title= $_POST["submittedTitle"];
 	$author = $_POST["bookAuthor"];
 	$category = $_POST["genre"];
 	$summary = $_POST["bookSummary"];

 	$isbn=htmlentities($link->real_escape_string($isbn));
 	$title= htmlentities($link->real_escape_string($title));
 	$author = htmlentities($link->real_escape_string($author));
 	$category = htmlentities($link->real_escape_string($category));
 	$summary = htmlentities($link->real_escape_string($summary));


 	$query = "Insert into books (ISBN, TITLE, AUTHOR, CATEGORY, SUMMARY) values ('$isbn','$title','$author','$category','$summary')";

 	$result = mysqli_query($link,$query);


 	header('Location: bookshelf.php');




?> 