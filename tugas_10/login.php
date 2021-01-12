<?php 

require 'functions.php';
session_start();

if(isset($_SESSION['login'])) {
	header("Location: index.php");
	exit;
}


if( isset($_POST['login']) ) {
    $login = login($_POST);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
</head>
<body>

   
   <div class="container-1">
	 <h1>Form Login</h1>

	 <?php if(isset($login['error'])): ?>
	   <p style="color:red; font-style:italic;"><?= $login['pesan']; ?></p>
	 <?php endif; ?>

	 <form action="" method="post">
	   <ul>
	     <li>
		   <label>
			   Username <br>
			   <input type="text" name="username">
		   </label>
		 </li>
		 <br>
		 <li>
		   <label>
			   Password <br>
			   <input type="password" name="password">
		   </label>
		 </li>
		 <br>
		 <li>
		  <button type="submit" name="login">Login</button>
		 </li>
	   </ul>
	 </form>
   </div>
	
</body>
</html>