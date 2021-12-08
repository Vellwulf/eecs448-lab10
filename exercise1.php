<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>EECS448 Lab10 Exercise 1</title>
		<meta name="description" content="Displays the empty tables made for">
		<meta name="author" content="Yuri Martinez-Moylan">
	</head>
	
	<style>
		body {
			background: LightBlue;
		}
	</style
	
	<?php
		$serverName = "mysql.eecs.ku.edu";
		$username = "y038m265";
		$password = "pukau9Ai";
		$databaseName = "y038m265";
	
		$conn = new mysqli($serverName, $username, $password, $databaseName);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	?>
	<body>
	
	<?php
		if ($conn->query("SELECT 1 FROM Users") === false)
			$conn->query("CREATE TABLE Users (user_id varchar(255) NOT NULL, PRIMARY KEY (user_id));");
			
		if ($conn->query("SELECT 1 FROM Users") !== false)
			echo "<h3>Users table created!</h3>";
		
		else
			echo "<h3>Failed to create Users table</h3>";
		
		if ($conn->query("SELECT 1 FROM Posts") === false)
			$conn->query("CREATE TABLE Posts (post_id int NOT NULL AUTO_INCREMENT, content varchar(1000) NOT NULL, author_id varchar(255) NOT NULL, PRIMARY KEY (post_id), FOREIGN KEY (author_id) REFERENCES Users (user_id));");
			
		if ($conn->query("SELECT 1 FROM Posts") !== false)
			echo "<h3>Posts table created!</h3>";
		
		else
			echo "<h3>Failed to create Posts table</h3>";
	?>
	</body>
</html>