<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>EECS448 Lab10 Exercise 2</title>
		<meta name="description" content="Lets user create a profile.">
		<meta name="author" content="Yuri Martinez-Moylan">
	</head>
	<body>
		<?php 
			$ID = $_POST["userInput"];
			
			if ($ID == "")
				echo "User ID creation unsuccessful; user ID cannot be blank.";
			
			else
				echo "User ID: " . $ID;
		?>
	</body>
</html>