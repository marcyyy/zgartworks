<?php

	$type_name = "";
	$edit_state = false;
	
	include 'db.inc.php';
	
	if (isset($_POST['save']))
	{
		$type_name = $_POST['type_name'];

		$query = "INSERT INTO merch_type (type_name) VALUES ('$type_name')";
		mysqli_query($conn, $query);
		header('location: ../merch_type.php?add');
	}

	if (isset($_POST['update']))
	{	
		$type_name = mysqli_real_escape_string($conn, $_POST['type_name']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);

		mysqli_query($conn, "UPDATE merch_type SET type_name = '$type_name' WHERE id=$id");
		header('location: ../merch_type.php?update');
	}

	if (isset($_GET['del']))
	{
		$id = $_GET['del'];

		mysqli_query($conn, "DELETE FROM merch_type WHERE id=$id");
		header('location: ../merch_type.php?delete');
	}

//read
	$results = mysqli_query($conn, "SELECT * FROM merch_type");