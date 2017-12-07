<?php
	session_start();
	
	echo print_r($_POST, true);
	
	$recordNaam = $_POST["txtRecordNaam"];
	$comment = $_POST["txtComment"];
	$datum = date("Y/m/d");
	
	date_default_timezone_set("Europe/Brussels");
	$startActiviteit = date("h:i:s");
	
	require("linkDB.php");
	
	$sql = "INSERT INTO record (RecordNaam, UserId, Datum, StartActiviteit, Comment) VALUES ('".$recordNaam."', '".$_SESSION["UserId"]."', '".$datum."' , '".$startActiviteit."', '".$comment."');";
	mysqli_query($conn,$sql);
	
	echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
?>