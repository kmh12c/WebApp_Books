<?php 

//FIRST STEP:  Add Book
//add the books, assumes these have been sent.  Could call it with no GET data and skip the step 1:
$useBook = $_GET['bid'];
$usePer = $_GET['1'];

//unset($_GET);

	 $link = mysqli_connect("localhost","root","","amazoncopycat");

	 $query = "Insert into checkedout ('id_book','id_user') values ('" . $useBook . "','" . $usePer . "')";

	 $result = mysqli_query($link,$query);
//Could do a check that it is successful and act upon that knowledge-for not assume success;

//SECOND STEP: Return new list of books

 

?>

