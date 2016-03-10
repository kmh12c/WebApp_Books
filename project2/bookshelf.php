<!-- CREATE TABLE webclass.BOOKS 
(ID INT not NULL Auto_Increment, 
ISBN VARCHAR(20) NOT NULL , 
TITLE VARCHAR(100) NOT NULL , 
AUTHOR VARCHAR(100) NOT NULL , 
CATEGORY VARCHAR(30) NOT NULL , 
SUMMARY VARCHAR(1000) NOT NULL ,
IN_DATE DATETIME NOT NULL, 
PRIMARY KEY (`ID`)) ENGINE = InnoDB; 

insert into books (isbn,title,author,category,summary,in_date) values
('13-3493021','Book One','Tom Jones','Fiction','a very boring book about the number 1',NOW());
insert into books (isbn,title,author,category,summary,in_date) values
('13-534439639','Book Two','Sarah Smith','Romance','A prequel to her first book',NOW());
insert into books (isbn,title,author,category,summary,in_date) values
('13-84205534','Book Three','Sarah Smith','Fiction','Well written story with lots of twists and turns',NOW());

drop table if exists users;

create table webclass.USERS
(ID INT not NULL Auto_Increment,
displayName varchar(50) not null,
password varchar(30) not null,
email varchar(30) not null,
administrator boolean default false,
PRIMARY KEY (`ID`)) ENGINE = InnoDB;

insert into users (displayName,password,email,administrator) values
('JamieR','password','jer12b@acu.edu',true);

insert into users (displayName,password,email,administrator) values
('DarleneR','password','dar123@juno.com',true);

insert into users (displayName,password,email,administrator) values
('NikiR','password','nmreinhard@gmail.com',false);

create table webclass.CheckedOut 
(id_user int not null,
 id_book int not null,
 date_out date not null
);
 -->






<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Project #2</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


		<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


		<link href="css/style_main.css" rel="stylesheet" />
		<script>

		$.ajaxSetup({cache: false}); 

		$(document).ready(function() {
  			  $.ajax({ url: "code/GetListofBooks.php",
             success: function(retdata) {$("#BrowseMode").html(retdata);}})})
             
             $(document).ready(function() {
  			  $.ajax({ url: "code/seeCart.php",
             success: function(retdata) {$("#seeCart").html(retdata);}})})



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

			}

		// function sendtoCart(id)
		// {

		// 	document.getElementById="drag' . $row["ID"] . '"
		//    	 $.ajax({
		//    	 	url: "addtoCart.php",
		// 			success: function(result){

		// }



		function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);

		}

		function drop(ev) {
			ev.preventDefault();
		    var data = ev.dataTransfer.getData("text");
		    alert(data)
		    //data= substr(data,-2,2)
		    ev.target.appendChild(document.getElementById(data));
		   	$.ajax({url: "code/ajax.php",
					type: "POST",
					data: {bookid: data},
				    success: function() { 
				    		alert("done");	}
				   });
		}		
		</script>

	</head>
	<body>


            <header>
                <h1><img src="images/Logo.png" ></h1>
                <img src="images/bookshelf.png" width=100px id="div1" ondrop="drop(event)" ondragover="allowDrop(event)" >
                <img src="images/wishlist.png" width=100px id="div1" ondrop="drop(event)" ondragover="allowDrop(event)" >

            </header>

			<div id="body-wrapper" role="main"> 
                <nav>
                    <!--getbootstrap.com-->
                    <ul class="nav nav-tabs">
                        <li role="presentation" ><a href="#" onClick="showit('BrowseMode')">Browse</a></li>
                        <li role="presentation" class="active" onClick="showit('col3')"><a href="#">Add Books</a></li>
                        <li role="presentation" onClick="showit('seeCart')"><a href="#">Cart</a></li>
                        <!-- <li role="presentation"><a href="#">Messages</a></li> -->
                        <li role="presentation"><a href="login.html">Logout</a></li>
                    </ul>	
                </nav>

        

				<div id="col3" class="">
                    
					<form method="post" action="Add_Book.php">
						<input type="text" class="form-control" style="width: 30%" name="submittedTitle" id="submittedTitle" placeholder="Book Title" required/> </br>
						<input type="text" name="bookISBN" id="bookISBN" placeholder="ISBN" required/> 
						<input type ="text" name="bookAuthor" id="bookAuthor" placeholder="Author" required/> </br> </br>
						<textarea name="bookSummary" id="bookSummary" class="form-control" placeholder="Summary" required></textarea> </br>
						<input type="text" name="genre" id="genre" placeholder="Book Category" required/>
						<input type="submit">
					</form> </br>
					OR (must be a csv file) :
				</br>
					<form method="post" action="Read_File_Insert.php">
					<input type="file" name="booklist"/> </br>
					<input type="submit">
				</form>

				</div>

				<div id="BrowseMode">
					&nbsp
				</div>
				
				<div id="seeCart">
					&nbsp
					
				</div>



			

				
				<!-- <div>
					Search by Genre: <input type="Text" name="genrePicker"/>
					<form method="post" action="Add_Review.php">
					<input type="text" name="review" id="review" placeholder="Book Review" /> </br>
					<input type="submit">



				</div>
 -->
				

			
			
	 <?php
					
				 // $link = mysqli_connect("localhost","root","","amazoncopycat") or die(mysql_error());
				 // $query="SELECT distinct(category) from books;"
				//  $results = mysqli_query($link, $query);
				//  while ($row = mysqli_fetch_assoc($results))
				//  {
				//  print '<div id="col1"><article><h2>' . $row['CATEGORY'] . '</h2>';
				//  echo '</article></div>';
				  
			  //	}

				  // if ($row['approved'] == true) {
				  // 	  echo '<p>Approved By:' . $row['approver'] . '</p>';
				  // 	}
				  // else {
				  // 	  echo '<p><button type="button" style="background-color:green" class="btn btn-primary" onclick="doApprove(' . $row['id'] . ');">Approve</button>
						// 	<button type="button" style="background-color:red" class="btn btn-primary" onclick="doReject(' . $row['id'] . ');">Reject</button></p>';
				 	//   }
				  // echo '</article></div>';
				  // }

			?>
			
			
		
    </div>
	</body>
</html>
