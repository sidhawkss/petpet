<?php
$dbuser = "root";
$dbpass = "P@ssword123";
$host = "localhost";
$dbname = "data";
$table = "users";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}


?>
