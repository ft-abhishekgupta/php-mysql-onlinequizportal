<?php	
	$ip = getenv('HTTP_CLIENT_IP')?: getenv('HTTP_X_FORWARDED_FOR')?: getenv('HTTP_X_FORWARDED')?: getenv('HTTP_FORWARDED_FOR')?: getenv('HTTP_FORWARDED')?: getenv('REMOTE_ADDR');
	$db_host = 'localhost';
	$db_name = 'load';
	$db_user = 'root';
	$db_pass = 'password';
	$conn = new mysqli($db_host,$db_user,$db_pass,$db_name);
	if($conn->connect_error){
		printf("Connect failed: %s\n",$conn->connect_error);
		exit;
	}
	$query = "select serverid from log where ip='".$ip."';";  
	include "servers.php";        
  	$result = $conn->query($query);
	$row=$result->fetch_assoc();
  	$previous=$row["serverid"];
  	if($previous!=null)
  		header("Location: http://".$servers[$previous]."/ds/studentlogin.php");
  	else{
  		$query = "select id from redirect where previous='previous';";             
	  	$result = $conn->query($query);
	  	$row=$result->fetch_assoc();
	  	$previous=$row["id"];
	  	$next;		
	  	$number=sizeof($servers);
	  	if($previous==-1){
	  		$next=0;
	  	}
	  	else{
	  		$next=($previous+1)%$number;
	  		while (!is_ping_address($servers[$next])) {
	  			$next=($next+1)%$number;
	  		}
	  	}
	  	$query = "update redirect set id=".$next." where previous='previous';";                
	  	$result = $conn->query($query);
	  	$query = "insert into log (ip,serverid) values ('".$ip."',".$next.");";                
	  	$result = $conn->query($query);
		header("Location: http://".$servers[$next]."/ds/studentlogin.php");
  	}	
	function is_ping_address($ip) {
	    exec('ping -c1 -w1 '.$ip, $outcome, $status);
	    preg_match('/([0-9]+)% packet loss/', $outcome[3], $arr);
	    return ( $arr[1] == 100 ) ? 0 : 1;
	}
?>