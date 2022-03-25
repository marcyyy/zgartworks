<?php

	$inclusion = "";
	$tat = "";
	$price = "";
	$edit_state = false;
	
	include 'db.inc.php';
	
	if (isset($_POST['save']))
	{	
		$style = $_POST['style'];
		$inclusion = $_POST['inclusion'];
		$tat = $_POST['tat'];
		$price = $_POST['price'];

		$query = "INSERT INTO commission (style, inclusion, tat, price) VALUES ('$style','$inclusion','$tat','$price')";
		mysqli_query($conn, $query);
		header('location: ../commission.php?add');
	}

	if (isset($_POST['update']))
	{	
		$style = mysqli_real_escape_string($conn, $_POST['style']);
		$inclusion = mysqli_real_escape_string($conn, $_POST['inclusion']);
		$tat = mysqli_real_escape_string($conn, $_POST['tat']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);

		mysqli_query($conn, "UPDATE commission SET style = '$style', inclusion = '$inclusion', tat = '$tat', price = '$price' WHERE id=$id");
		header('location: ../commission.php?update');
	}

	if (isset($_GET['del']))
	{
		$id = $_GET['del'];

		mysqli_query($conn, "DELETE FROM commission WHERE id=$id");
		header('location: ../commission.php?delete');
	}

//read
	$results = mysqli_query($conn, "SELECT * FROM style INNER JOIN commission ON commission.style = style.id");