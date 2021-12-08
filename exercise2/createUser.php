<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>EECS448 Lab10 Exercise 2</title>
		<meta name="description" content="Lets user create a profile.">
		<meta name="author" content="Yuri Martinez-Moylan">
	</head>
	<style>
		body {
			background: LightBlue;
		}
	</style>
	<body>
		<?php 
			function isUser($inputID, $conn) {
				$query = "SELECT user_id FROM Users";
				$userIDs = $conn -> query($query);
				
				while ($tempID = $userIDs -> fetch_assoc()) {
					
					if ($inputID == $tempID["user_id"])
						return true;
				}
				
				return false;
			}
			
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
			
			$ID = $_POST["userInput"];
			
			if ($ID == "")
				echo "User ID creation unsuccessful; user ID cannot be blank.";
			
			else if (isUser($ID, $conn)) {
				echo "User ID create unsuccessful; user ID already exists.";
			}
			
			else {
				$sql = "INSERT INTO Users (user_id) VALUES ('" . $ID . "')";

				if ($conn->query($sql) === TRUE) {
					echo "User ID creation successful! Welcome, " . $ID;
				} 
				
				else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
			
			$conn -> close();
		?>
	</body>
</html>