<?php
	# Stop Hacking attempt
	if(!defined('__APP__')) {
		die("Hacking attempt");
	}
	
	# Connect to MySQL database

	$conn = mysqli_connect('localhost','root','','webprog');
    if($conn){

    }else{
        die('Greška povezivanja s MySQL serverom.');
    }

?>