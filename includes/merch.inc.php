<?php 
	
	include 'db.inc.php';
	$msg = "";

	if (isset($_POST['upload'])) {

		$target = "merch/" . basename($_FILES['image']['name']);

		$image = $_FILES['image']['name'];
		$type = $_POST['type'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$price = $_POST['price'];

		mysqli_query($conn,"INSERT INTO merch (type, image, title, description, price) VALUES ('$type', '$image', '$title', '$description', '$price')") or die(mysqli_error($conn));

		if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
			{
				header("location: ../merch_update.php?upload=success");
			}else{
				header("location: ../merch.php?upload=fail");
			}

	}