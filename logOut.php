<?php
	
	setcookie("BookApp", "", time()-3600);
	unset($_COOKIE["BookApp"]);
	header('Location: index.php');

?>