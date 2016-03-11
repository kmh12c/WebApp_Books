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
?>
<html lang="en">
<head>
    <title>My Book App</title>
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    <link href="css/style_main.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
              var data = "<?php print $email; ?>";
              $.ajax({ 
                url: "php/seeWishlist.php",
                type: "POST",
                data: {email: data},
                success: function(retdata) {
                    $("#BrowseMode").html(retdata);
                },
                error: function() {
                    alert("There has been an error.");
                }
            });
        });

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

        function getBook(ev) {
            window.location = "book.php?book=" + ev.target.id;
        };  
    </script>
</head>
<body>
    <header>
        <!-- <h1><img src="img/Logo.png" ></h1> -->
        <nav>
            <ul class="main-nav nav nav-pills pull-right">
                <li role="presentation"><a class="cd-signin" href="cart.php"><img src="img/shoppingCart.png" width="50em" id="checkedout" ondrop="drop(event)" ondragover="allowDrop(event)"></a></li>
                <li role="presentation"><a class="cd-signin" href="bookshelf.php"> Bookshelf</a></li>
                <li role="presentation"><a class="cd-signin" href="logOut.php"> Sign Out</a></li>
            </ul>
        </nav>
        <a href="index.php"><h2 class="">My Book Sharing App (Wishlist)</h2></a>
    </header>
    <div id="body-wrapper" role="main">
        <div id="BrowseMode">
            &nbsp;
        </div>
    </div>
</body>
</html>
