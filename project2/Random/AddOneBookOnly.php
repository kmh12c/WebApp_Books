<?php 

//FIRST STEP:  Add Book
//add the books, assumes these have been sent.  Could call it with no GET data and skip the step 1:
$useTitle = $_GET['title'];
$useAuthor = $_GET['author'];
$useISBN = $_GET['ISBN'];
$useCat =  $_GET['genre'];
$useSum = $_GET['summary'];
//unset($_GET);

	 $link = mysqli_connect("localhost","root","","amazoncopycat");

	 $query = "Insert into books (title,author,isbn,category,summary) values ('" . $useTitle . "','" . $useAuthor . "','" . $useISBN . 
	          "','" . $useCat . "','" . $useSum  . "')";

	 $result = mysqli_query($link,$query);
//Could do a check that it is successful and act upon that knowledge-for not assume success;

//SECOND STEP: Return new list of books

    $useGenre = 'All';   // - need to set this variable when link on main page hit $_SESSION['genre']

    $link = mysqli_connect("localhost","root","","amazoncopycat");

    $query = "select * from books where id not in (select id_book from checkedout) and ('All'='" . $useGenre .
             "' or trim(category) = '" . $useGenre . "') order by title";

    $results = mysqli_query($link,$query);
 
 return false;

?>

