<?php

    $id = $_POST["id"];

    $link = mysqli_connect("localhost","sMove","","amazoncopycat") or die(mysql_error());
    $query="SELECT * FROM books1 b where b.id = '$id'";
    $results = mysqli_query($link, $query);
    

    while ($row = mysqli_fetch_assoc($results))
    {  
      print '<div id= "myBook">';
      print '<h1><img src="img/genericBook.png" class="bookImg" id = "' . $row['id'] . '" draggable="true" ondragstart="drag(event)" onclick="getBook(event)">' . $row["title"] . '</h1>';
      print '<h2> by' . $row["author"] . ', Category:' . $row["category"] . ', ISBN: ' . $row["isbn"] . '</h2>';
      print '</div>';
    }
?>