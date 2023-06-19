<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<div id="imagelogo">
	<img src="attendance.jpg"></img>




	<form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     
     	<input type="text" name="uname" placeholder="User Name"><br> <br>

     	
     	<input type="password" name="password" placeholder="Password"><br><br>

     	<button type="submit">Login</button>
     </form>

	</div>


     
</body>
</html>