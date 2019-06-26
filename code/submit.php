<?php
	session_start();
    if(!isset($_SESSION["studentloggedin"]) || $_SESSION["studentloggedin"] !== true){
      header("location: studentlogin.php");
      exit;
    }
	$rollnumber=$_SESSION["rollnumber"];
    $totalques=$_SESSION["numques"];
    $quiznumber=$_SESSION["quiznumber"];
	include "database.php";
	$sql = "select maxmarks from quizconfig where quiznumber=".$quiznumber.";";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$maxmarks = $row["maxmarks"];  
	$sql = "insert into result (rollnumber,quiznumber,submit,maxmarks) values (".$rollnumber.",".$quiznumber.",1,".$maxmarks.");";
    $result = $conn->query($sql);    
	header("Location: studentlogout.php");
?>