<?php 

//need to get some way of passing what is in the genre select list and change fiction to use it
    $useGenre = 'Fiction';


                  $userid = 2;

                  
                    //assuming in login page, session variables for displayname & if they are a moderator are set


                  $link = mysqli_connect("localhost","root","","amazoncopycat") or die(mysql_error());
                  $query="select * from books b, checkedout c where c.ID_USER='$userid' and b.ID=c.ID_BOOK";
                  $results = mysqli_query($link, $query);
                  
                  echo '<table border="0" cellpadding="0" cellspacing="0" width="100%" class="scrollTable">';
                  echo '<thead class="fixedHeader">';
                  echo '<tr ><th></th><th><a>Title</a></th><th><a>Author</a></th><th><a>Genre</a></th><th><a>ISBN</a></th></tr>';
                  echo '</thead><tbody class="scrollContent">';

                  while ($row = mysqli_fetch_assoc($results))
                  {  
                  echo '<tr>';
                  echo '<td><img src="images/genericbook.png"  height="30"></td>';
                  echo '<td>' . $row["TITLE"] . '</td>';
                  echo '<td>' . $row["AUTHOR"] . '</td>';
                  echo '<td>' . $row["CATEGORY"] . '</td>';
                  echo '<td>' . $row["ISBN"] . '</td>';
                  echo '</tr>';
                  }
                      echo '</tbody></table>';

                 
                

                  // if ($row['approved'] == true) {
                  //      echo '<p>Approved By:' . $row['approver'] . '</p>';
                  //    }
                  // else {
                  //      echo '<p><button type="button" style="background-color:green" class="btn btn-primary" onclick="doApprove(' . $row['id'] . ');">Approve</button>
                        //  <button type="button" style="background-color:red" class="btn btn-primary" onclick="doReject(' . $row['id'] . ');">Reject</button></p>';
                    //   }
                  // echo '</article></div>';
                  // }

            ?>
