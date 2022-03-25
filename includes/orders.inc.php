<?php
	
	$email = "";
	$fname = "";
	$lname = "";
	$cart_merch = "";	
	$order_date = "";

	$submit_state = false;

	include 'db.inc.php';
	
	if (isset($_POST['submit']))
	{			
		$submit_state = true;

		$email = $_POST['email'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$name = $fname . ' ' . $lname;

		$rec = mysqli_query($conn, "SELECT max(cart_merch) as cart_merch FROM cart");
		$record = mysqli_fetch_array($rec) or die( mysqli_error($conn));
		$cart_merch = $record['cart_merch'];

		$order_date = date('Y-m-d');		

		$query = "INSERT INTO orders_merch (email, name, cart_merch, order_date) VALUES ('$email','$name', '$cart_merch','$order_date')";
		mysqli_query($conn, $query) or die( mysqli_error($conn));
		header('location: ../cart.php');
	}

	if ($submit_state == false):
		{	
			$rec = mysqli_query($conn,"SELECT max(cart_merch)+1 as cart_merch FROM cart") or die( mysqli_error($conn));
			$record = mysqli_fetch_array($rec);
			$cart_merch = $record['cart_merch'];
		}
	endif;