<?php

	include_once('config.php');
	echo "Host: " . $conn->host_info ."\n";

	$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?,?)");
	$stmt->bind_param("ss", $email, $pass);

	$email = $_POST['email'];
	$pass  = $_POST['pass'];

	echo $email;
	echo $pass;


	$stmt->execute();
	$stmt->close();
	$conn->close();


?>
