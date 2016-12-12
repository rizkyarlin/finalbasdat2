<?php
	$server = 'localhost';
	$username = 'basdat2';
	$password = '';
	$database = 'basdat2';

	$db = new mysqli($server,$username,$password,$database);

	if($db->connect_error){
		die('Error' . $db->connect_error);
	}

?>