<?php
	session_start();

	$email = "";
	$fname = "";
	$lname = "";
	$cart_merch = 0;	
	$order_date = "";
	$submit_state = "";
	$status = "";

	include 'db.inc.php';
	
	if (isset($_POST['save']))
	{	
		$submit_state = true;
		$cart_merch = $_POST['cart_merch'];
		$merch_id = $_POST['merch_id'];

		$query = "INSERT INTO cart (cart_merch, merch_id) VALUES ('$cart_merch', '$merch_id')";
		mysqli_query($conn, $query) or die( mysqli_error($conn));
		$_SESSION['substate'] = $submit_state;
		header('location: ../store.php?add');
	}

	if (isset($_POST['submit']))
	{	
		$submit_state = false;

		$email = $_POST['email'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$name = $fname . ' ' . $lname;

		$rec = mysqli_query($conn, "SELECT max(cart_merch) as cart_merch FROM cart");
		$record = mysqli_fetch_array($rec) or die( mysqli_error($conn));
		$cart_merch = $record['cart_merch'];

		$total_price = $_POST['total'];

		$order_date = date('Y-m-d');	
		$status = "Pending";

		$query = "INSERT INTO orders_merch (email, name, cart_merch, total_price, order_date, status) VALUES ('$email','$name', '$cart_merch', '$total_price','$order_date','$status')";
		mysqli_query($conn, $query) or die( mysqli_error($conn));
		$_SESSION['substate'] = $submit_state;
		header('location: ../store.php?success');
	}
