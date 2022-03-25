<?php

include 'db.inc.php';

if (isset($_POST['update']))
	{	
		$about = mysqli_real_escape_string($conn, $_POST['about']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);

		mysqli_query($conn, "UPDATE anc SET about='$about', email='$email', phone='$phone' WHERE id=$id");
		header('location: ../anc.php?updateanc');
	}