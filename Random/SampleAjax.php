<!doctype html>	
<html>	    
<head>	        
<title>Learning jQuery</title>	        	        
<meta charset="utf-8" />	        
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />	        
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="code/jquery.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
<!--added the accordion-->	
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">      	        
	        	    
    </head>	    	    
    <body>	
    <h1>The Title</h1>     
    <p>this is text</p>

<p>This is the updated list of books</p>

<p>End of Fill me</p>
<div id="andme">
these are data
</div>
<p>end of and me</p>

<form id = "BookForm"   >
      <label for="title">Title</label><input type="text" name="title" />
      <label for="author">Author</label><input type="text" name="author" />
      <label for="genre">Genre</label><input type="text" name="genre"/>
      <label for="ISBN">ISBN</label><input type="text" name="ISBN"/>
      <label for="summary">summary</label><input type="text" name="summary"/>
      <button id="DoIt">Hit Me</button>
</form>

    <script>	            	            

/*this worked
     $("#doalert").click(function() {
        $("h1").append('more title');  });  
*/
/* this worked*/

$.ajaxSetup({cache: false}); 

$(document).ready(function() {
    $.ajax({ url: "getListofBooks.php",
             success: function(retdata) {$("#andme").html(retdata);}})

   });


     $("#DoIt").click(function() {
        $.ajax({url: "AddOneBookOnly.php",
                type: "GET",
                data: $("#BookForm").serialize() })
                .success(function() { alert("i am working"); }) //$("#andme").html(''); $("#andme").load("getListofBooks.php"); }   
              });         

/*
      $("#DoIt").click(function() {
         var useURL = $('#BookForm').attr("action");
         var sData = $('Form').serialize();

         alert (sData);
        $.ajax({type: "POST",
                url:useURL,
                data: $('#BookForm').serialize() })
         .success(function(data) { $("#fillme").html(data); $("#andme").html(data); })
         .error(function() {alert("error"); })
         .complete(function() {alert("complete"); });
      });
*/
    


    	</script>	
        	        	   
  </body>	
  </html>	