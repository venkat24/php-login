 <html>
 <head>
 	<title>Login Confirmed!</title>
 </head>
 <body>
 	<?php
 		require("config.php");
 		$username = $_POST["username"];
 		$password = $_POST["password"];
 		$hash = md5($password);
 		$query = "SELECT imagepath FROM user WHERE username = '$username' AND password = '$hash';";
 		$result = mysqli_query($db,$query);
     	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     	$count = mysqli_num_rows($result);
      	if($count == 1) {
         	echo "<br><h1>Succesful Login!</h1>";
         	echo '<img src="'. $row["imagepath"] . '">';
      	} else {
         echo "<br><h1>Your Login Name or Password is invalid</h1>";
      	}
	?> 		
 </body>
 </html>
 <html>