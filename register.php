<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="formContainer">
      <form action="register.php" method="post">

        <div class="imgcontainer">
          <!-- <img src="https://images.pexels.com/photos/39317/chihuahua-dog-puppy-cute-39317.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Photo" class="avatar"> -->
        </div>

        <div class="container">
          <label for="email"><b>E-mail</b></label>
          <input type="text" placeholder="Enter e-mail address" name="email" required>
    
          <label for="password"><b>Senha</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
    
          <button type="submit">Registrar</button>
        </div>

        <!-- 
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>  
        -->
      </form>
    </div>
</body>
</html>



<?php

	include_once('config.php');
	//echo "Host: " . $conn->host_info ."\n";

	$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?,?)");
	$stmt->bind_param("ss", $email, $pass);

	$email = $_POST['email'];
	$s = apache_getenv('Starlink');
	$pass = sha1($_POST['password'].$s);

	//echo $email;
	//echo $pass;


	$stmt->execute();
	$stmt->close();
	$conn->close();


?>
