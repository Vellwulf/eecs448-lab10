<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>EECS448 Lab10 Exercise 6</title>
		<meta name="description" content="Allows admin to view posts by user.">
		<meta name="author" content="Yuri Martinez-Moylan">
	</head>
	<style>
		body {
			background: LightBlue;
		}
	</style>
	
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
		
		$targetID = $_POST["userSelect"];
		$userIDs = $conn->query("SELECT user_id FROM Users");
		
		$conn -> close();
	?>
	
	<body>
		<?php
			echo "targetID: " . $targetID;
		?>
			
	</body>
</html>