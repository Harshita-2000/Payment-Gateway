<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="payment gateway";

	$conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(!$conn){
		die("Could not connect to the database".mysqli_connect_error());

	}
	?>