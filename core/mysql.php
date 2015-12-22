<?php 
require_once 'app/configs/db.php';

	$conn = mysqli_connect($host, $user, $psw, $db);
	
	if(!$conn) {
		die("Check mysql configurations.");
	}