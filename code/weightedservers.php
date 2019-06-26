<?php
	$someservers = array("localhost");
	$weights = array(1,2,1);
	$servers = array();
	$k=0;
	for($i=0;$i<sizeof($weights);$i++){		
		for ($j=0; $j < $weights[$i]; $j++) { 
			$servers[$k]=$someservers[$i];
			$k++;
		}
	}
?>