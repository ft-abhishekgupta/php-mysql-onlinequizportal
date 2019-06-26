<?php
	include "servers.php";
	$db_name = 'quiz';
	$db_user = 'root';
	$db_pass = 'password';	
	$number=sizeof($servers);
	$conn[$number];
	for ($i=0; $i < $number ; $i++) { 
		$conn[$i] = new mysqli($servers[$i],$db_user,$db_pass,$db_name);
		if($conn[$i]->connect_error){
			printf("Connect failed: %s\n",$conn->connect_error);
			exit;
		}
	}	
?>
