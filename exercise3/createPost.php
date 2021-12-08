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
			
			$ID = $_POST["inputID"];
			$message = $_POST["postMessage"];
			
			if ($ID == "" || $message == "")
				echo "<h3>Error: user ID and post message inputs cannot be blank.</h3>";
			
			else if (!isUser($ID, $conn)) {
				echo "<h3>Error: inputted user id does not exist in database. Please double-check input.</h3>";
			}
			
			else {
				$sql = "INSERT INTO Posts (content, author_id) VALUES ('".$message."', '".$ID."')";

				if ($conn->query($sql) === TRUE) {
					echo "<h3>New post created successfully!</h3>";
				} 
				else {
					echo "<h3>Error: " . $sql . "<br>" . $conn->error . "</h3>";
				}
			}
			
			$conn -> close();
		?>
	</body>
</html>