<?php session_start();

  // found help for this topic at http://stackoverflow.com/questions/2601349/read-a-text-file-and-transfer-contents-to-mysql-database 

  if($_POST["booklist"] != null && $_POST["booklist"] != "")
  {
    try
      {
          $theFile = fopen($_POST["booklist"], "r"); //open the file
          $ctr = 0;

          while (!feof($theFile)) // Loop til end of file.
          {
            $ctr = $ctr + 1;

            $frow = fgets($theFile, 4096); // Read a line.

            list($a,$b,$c,$d,$e)=explode(",",$frow);   

            $link = mysqli_connect("localhost","sMove","","amazoncopycat");    

            $query = "INSERT INTO books1 (isbn, title, author, category, summary) VALUES('$a','$b', '$c',' $d ','$e')";
          
            $results = mysqli_query($link,$query);
          }

          $_SESSION['msg'] = $ctr . " Books uploaded";
          header('Location: bookshelf.php'); 
      }
    catch ( Exception $e ) {
        print '<script>console.log("' . $e .'")</script>';
    } 
  }  
?>
