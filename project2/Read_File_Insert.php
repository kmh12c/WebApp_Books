<?php session_start();

// found help for this topic at http://stackoverflow.com/questions/2601349/read-a-text-file-and-transfer-contents-to-mysql-database 
$theFile = fopen($_POST["booklist"], "r"); //open the file
$ctr = 0;
while (!feof($theFile)) // Loop til end of file.
{
	$ctr = $ctr + 1;

    $frow = fgets($theFile, 4096); // Read a line.

    list($a,$b,$c,$d,$e)=explode(",",$frow);   


    $link = mysqli_connect("localhost","root","","amazoncopycat");

    //$query = "INSERT INTO books (isbn, title, author, category, summary) VALUES('".$a."','".$b."', '".$c."','" . $d . "','" . $e . "')";

    $query = "INSERT INTO books (isbn, title, author, category, summary) VALUES('$a','$b', '$c',' $d ','$e')";
  
    $results = mysqli_query($link,$query);
}
   $_SESSION['msg'] = $ctr . " Books uploaded";
   header('Location: bookshelf.php');
  

?>
