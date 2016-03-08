<?php 

//need to get some way of passing what is in the genre select list and change fiction to use it
    $useGenre = 'Fiction';


 
            
                    //assuming in login page, session variables for displayname & if they are a moderator are set


                  $link = mysqli_connect("localhost","root","","amazoncopycat") or die(mysql_error());
                  $query="select * from books";
                  $results = mysqli_query($link, $query);
                  
                  print '<table id="BrowseMode" border="0" cellpadding="0" cellspacing="0" width="100%" class="scrollTable">';
                  print '<thead class="fixedHeader">';
                  print '<tr><th></th><th><a>Title</a></th><th><a>Author</a></th><th><a>Genre</a><th><th><a>ISBN</a><th></tr>';
                  print '</thead><tbody class="scrollContent">';

                  while ($row = mysqli_fetch_assoc($results))
                  {  
                  print '<tbody class="scrollContent"><tr>';
                  print '<td><img id="drag' . $row["ID"] . '" src="images/genericbook.png" draggable="true" ondragstart="drag(event)" height="30"></td>';
                  print '<td>' . $row["TITLE"] . '</td>';
                  print '<td>' . $row["AUTHOR"] . '</td>';
                  print '<td>' . $row["CATEGORY"] . '</td>';
                  print '<td>' . $row["ISBN"] . '</td>';
                  print '</tr>';
                  }
                      print '</tbody></table>';

                 
                

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
