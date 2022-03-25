<?php

include 'db.inc.php';

if (isset($_POST['update']))
	{	
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);

		mysqli_query($conn, "UPDATE accounts SET account_username='$username', account_password='$password' WHERE account_id=$id");
		header('location: ../account.php?success');
	}