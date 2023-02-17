<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

	<form action="login.php" method="post">
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>
    <div class="container">
      <label for="email"><b>E-mail</b></label>
      <input type="text" placeholder="Enter e-mail address" name="email" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>

  </form>
</body>
</html>


<?php

	include_once('config.php');
	echo "\n\nHost: " . $conn->host_info ."\n";

  $email    = $_POST['email'];
	$password = $_POST['password'];

	$stmt = $conn->prepare('SELECT id,email,password FROM users WHERE email = ? AND password = ? ');
	$stmt->bind_param('ss',$email, $password);
	$stmt->execute();

	$stmt->bind_result($id,$email,$password);
	if($stmt->fetch() === true){
    $_SESSION['mail']=$email;
    $_SESSION['uid']=$id;
    header('Location: home.php');
	}else{
		echo '<script>alert("Credenciais invalidas")</script>';
	};

	$stmt->close();
	$conn->close();
?>


