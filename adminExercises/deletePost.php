<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>EECS448 Lab10 Exercise 7</title>
		<meta name="description" content="Allows admin to select posts to delete.">
		<meta name="author" content="Yuri Martinez-Moylan">
	</head>
	<style>
		body {
			background: LightBlue;
		}
		
		p.ID {
			text-indent: 15px;
			margin-bottom: -10px;
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
		
		$targetPosts = $_POST["userSelect"];
	?>
	
	<body>
		<h3>Deletion complete! Here are the IDs of the deleted posts:</h3>
		
		<?php
			forEach($targetPosts as $postID) {
				$sql = "DELETE FROM Posts WHERE post_id=" . $postID;
				$conn -> query($sql);
				echo '<p class="ID">' . $postID . '</p>';
			}
			
			$conn -> close();
		?>
		
	</body>
</html>