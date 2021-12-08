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
		
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		
		th {
			background: #8DFF7F;
		}
		
		td {
			background: #FF7F7F;
		}
	</style>
	<body>
		<h1>All Current Users:</h1>
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
			
			$userIDs = $conn->query("SELECT user_id FROM Users");

			$conn -> close();
		?>
		<table>
			<tr>
				<th>User ID</th>
			</tr>
			<?php
				while ($tempID = $userIDs->fetch_assoc())
					echo "<tr><td>" . $tempID["user_id"] . "</td></tr>";
			?>
		</table>
		
	</body>
</html>