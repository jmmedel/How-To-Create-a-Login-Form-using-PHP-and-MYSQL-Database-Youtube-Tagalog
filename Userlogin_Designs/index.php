<?php

session_start();

  if(!isset($_SESSION['userlogin'])){
      header("Location: login.php");
  }

  if(isset($_GET['logout'])){
      session_destroy();
      unset($_SESSION);
      header("Location: login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
		<p>Welcome to index</p>
		<a href="index.php?logout=true">Logout</a>
</body>
</html>
