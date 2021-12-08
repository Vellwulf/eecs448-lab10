<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>EECS448 Lab10 Exercise 3</title>
		<meta name="description" content="Lets user create a post.">
		<meta name="author" content="Yuri Martinez-Moylan">
	</head>
	<style>
		body {
			background: LightBlue;
		}
	</style>
	<body>
		<?php 
			$serverName = "mysql.eecs.ku.edu";
			$username = "y038m265";
			$password = "pukau9Ai";
			$databaseName = "y038m265";
	
			// Create connection
			$conn = new mysqli($serverName, $username, $password, $databaseName);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			echo "connection successful";
			$conn -> close();
		?>
	</body>
</html>