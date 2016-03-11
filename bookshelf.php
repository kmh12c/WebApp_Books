<?php

    $loggedIn=false;
    if(isset($_COOKIE["BookApp"]))
    {
        $name = $_COOKIE["BookApp"];
        $cryptedCookie = $_COOKIE["Validate"];
        $cryptedName = crypt($name,"itsrainingtacos");
        if($cryptedCookie == $cryptedName)
            $loggedIn = true;
    }

    if(!$loggedIn){
        header('Location: index.php');
    }

    $link = new mysqli("localhost","sMove","","amazoncopycat");

    if ($link->connect_errno) {
        printf("Connect failed: %s\n", $link->connect_error);
        exit();
    }

    $email = $_COOKIE["BookApp"];

    $checkedout = "checkedout";
    $wishlist = "wishlist";
?>
<html lang="en">
	<head>
		<title>My Book Sharing App</title>
		<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/style_main.css" rel="stylesheet" />
		<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script>
            var checkedout = "checkedout";
            var wishlist = "wishlist";
			$.ajaxSetup({cache: false}); 

            function printBooks() {
                  $.ajax({ 
                    url: "php/GetListofBooks.php",
                    success: function(retdata) {
                        $("#BrowseMode").html(retdata);
                    },
                    error: function() {
                        alert("There has been an error.");
                    }
                });
            };

			function showit(inName) {
				var i;
				var allModes=['BrowseMode','col3'];

				for (i=0; i<allModes.length; ++i) {
					if (allModes[i]==inName) {
						$("#"+allModes[i]).css('display', 'block');
					}
					else {
						$("#"+allModes[i]).css('display', 'none');
					}
				}

                if(inName == 'BrowseMode') {
                    printBooks();
                }
			};

			function allowDrop(ev) {
				ev.preventDefault();
			}

			function drag(ev) {
				ev.dataTransfer.setData("text", ev.target.id);
			}

			function drop(ev) {
				ev.preventDefault();
			    var data = ev.dataTransfer.getData("text");
			    ev.target.appendChild(document.getElementById(data));
			   	$.ajax({
			   		url: "php/ajax.php",
					type: "POST",
					data: {bookid: data, type: ev.target.id, userid: "<?php print $email; ?>"},
				    success: function() {},
			    	error: function() {
			    		alert("There has been an error.")
			    	}
				});
			};	

            $(document).ready(function() {
                $(".tab").click(function () {
                    $(".tab").removeClass("active");
                    // $(".tab").addClass("active"); // instead of this do the below 
                    $(this).addClass("active");   
                });
            });

            function validateAddBook() {
                var a = document.forms["addBook"]["submittedTitle"].value;
                if (a == null || a == "") {
                    alert("Title must be filled out");
                    return false;
                }

                var b = document.forms["addBook"]["bookISBN"].value;
                if (b == null || b == "") {
                    alert("ISBN must be filled out");
                    return false;
                }

                var c = document.forms["addBook"]["bookAuthor"].value;
                if (c == null || c == "") {
                    alert("Author must be filled out");
                    return false;
                }

                var d = document.forms["addBook"]["bookSummary"].value;
                if (d == null || d == "") {
                    alert("Summary must be filled out");
                    return false;
                }

                var e = document.forms["addBook"]["genre"].value;
                if (e == null || e == "") {
                    alert("Category must be filled out");
                    return false;
                }
            };

            function validateFile() {
                var a = document.forms["uploadList"]["booklist"].value;
                if (a == null || a == "") {
                    alert("Please upload a text file.");
                    return false;
                }
            };	

            function getBook(ev) {
                window.location = "book.php?book=" + ev.target.id;
            };  
		</script>
	</head>
    <body>
        <header>
            <nav>
                <ul class="main-nav nav nav-pills pull-right">
                    <li role="presentation"><a class="cd-signin" href="cart.php"><img src="img/shoppingCart.png" width="50em" id="checkedout" ondrop="drop(event)" ondragover="allowDrop(event)"></a></li>
                    <li role="presentation"><a class="cd-signin" href="wishlist.php"><img src="img/wishlist.png" width="50em" id="wishlist" ondrop="drop(event)" ondragover="allowDrop(event)"></a></li>
                    <li role="presentation"><a class="cd-signin" href="bookshelf.php"> Bookshelf</a></li>
                    <li role="presentation"><a class="cd-signin" href="logOut.php"> Sign Out</a></li>
                </ul>
            </nav>
            <a href="index.php"><h2 class="">My Book Sharing App</h2></a>
        </header>
        <div id="body-wrapper" role="main"> 
            <nav>
                <ul class="nav nav-tabs">
                    <li role="presentation" class="tab" ><a href="#" onClick="showit('BrowseMode')">Browse</a></li>
                    <li role="presentation" class="tab active" onClick="showit('col3')"><a href="#">Add Books</a></li>
                </ul>   
            </nav>
            <div id="col3" class="">
                <form method="post" name="addBook" onSubmit="return validateAddBook()" action="php/Add_Book.php">
                    <input type="text" class="form-control" style="width: 30%" name="submittedTitle" id="submittedTitle" placeholder="Book Title" required/> <br/>
                    <input type="text" name="bookISBN" id="bookISBN" placeholder="ISBN" required/> 
                    <input type ="text" name="bookAuthor" id="bookAuthor" placeholder="Author" required/> <br/> <br/>
                    <textarea name="bookSummary" id="bookSummary" class="form-control" placeholder="Summary" required></textarea> <br/>
                    <input type="text" name="genre" id="genre" placeholder="Book Category" required/>
                    <input type="submit">
                </form> <br/>
                OR upload a text file:<br/>
                <form method="post" name="uploadList" onSubmit="return validateFile()" action="php/Read_File_Insert.php">
                    <input type="file" accept= "text/*" name="booklist" required> <br/>
                    <input type="submit">
                </form>
            </div>
            <div id="BrowseMode">
                &nbsp;
            </div>
        </div>
        <footer class="footer">
            <p>&copy; Jamie Reinhard and Kayla Holcomb 2016</p>
        </footer>
    </body>
</html>