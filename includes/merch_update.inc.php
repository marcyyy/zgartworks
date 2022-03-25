<?php
	$title= "";
	$image= "";
	$description= "";
	$price= "";
	$edit_state = false;
	
	include 'db.inc.php';
	

	if (isset($_POST['update']))
	{	
		$type = mysqli_real_escape_string($conn, $_POST['type']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);

		mysqli_query($conn, "UPDATE merch SET type = '$type', title = '$title', description = '$description', price = '$price' WHERE id=$id") or die( mysqli_error($conn));
		header('location: ../merch_update.php?upload=update');
	}

	if (isset($_GET['del']))
	{
		$id = $_GET['del'];

		mysqli_query($conn, "DELETE FROM merch WHERE id=$id");
		header('location: ../merch_update.php?upload=delete');
	}

//read

	$sql = "SELECT * FROM merch_type INNER JOIN merch ON merch.type = merch_type.id";
	$results = mysqli_query($conn, $sql) or die( mysqli_error($conn));