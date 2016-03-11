<?php session_start();
    $email = $_POST["email"];

    $link = mysqli_connect("localhost","sMove","","amazoncopycat") or die(mysql_error());
    $query="SELECT b.title, b.author, b.category, b.isbn, b.id, w.id, w.user FROM books1 b join wishlist w on (b.id = w.id) where w.user = '$email'";
    $results = mysqli_query($link, $query);
    
    print '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="scrollTable">';
    print '<thead class="fixedHeader">';
    print '<tr ><th></th><th><a>Title</a></th><th><a>Author</a></th><th><a>Genre</a></th><th><a>ISBN</a></th></tr>';
    print '</thead><tbody class="scrollContent">';

    while ($row = mysqli_fetch_assoc($results))
    {  
      print '<tr id = "' . $row['id'] . '" draggable="true" ondragstart="drag(event)">';
      print '<td><img src="img/genericBook.png" id = "' . $row['id'] . '" draggable="true" ondragstart="drag(event)" onclick="getBook(event)" height="30"></td>';
      print '<td>' . $row["title"] . '</td>';
      print '<td>' . $row["author"] . '</td>';
      print '<td>' . $row["category"] . '</td>';
      print '<td>' . $row["isbn"] . '</td>';
      print '</tr>';
    }
    print '</tbody></table>';
?>