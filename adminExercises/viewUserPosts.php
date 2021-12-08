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
		
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
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
		$userPosts = $conn->query("SELECT post_id, content FROM Posts WHERE author_id='".$targetID."'");
		
		$conn -> close();
	?>
	
	<body>
		<h3>Posts by <?php echo $targetID ?>:</h3>
		
		<table style="width: 50%;">
			<tr>
				<th width="75px">Post ID</th>
				<th>Content</th>
			</tr>
			<?php
				while ($tempPost = $userPosts->fetch_assoc()) {
					echo "<tr><td>" . $tempPost["post_id"] . "</td><td>" . $tempPost["content"] . "</td></tr>";
				}
			?>
		</table>
		
	</body>
</html>