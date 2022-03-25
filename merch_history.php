<?php

	$items_state = false;
	$total = 0;
	$count = 0;

	include 'includes/db.inc.php';

	$results1 = mysqli_query($conn, "SELECT * FROM orders_merch WHERE NOT status = 'Pending' ") or die( mysqli_error($conn));

	if (isset($_GET['details']))
	{	
		$items_state = true;
		$id = $_GET['details'];
		$results2 = mysqli_query($conn, "SELECT * FROM merch_type 
		INNER JOIN merch ON merch.type= merch_type.id 
		INNER JOIN cart ON merch.id = cart.merch_id 
		INNER JOIN orders_merch ON cart.cart_merch = orders_merch.cart_merch
		WHERE orders_merch.id=$id")
		or die( mysqli_error($conn));

		$result2 = mysqli_query($conn, "SELECT total_price AS total FROM orders_merch WHERE id = $id"); 
		$row2 = mysqli_fetch_assoc($result2); 
		$sum = $row2['total'];

		$rec1 = mysqli_query($conn, "SELECT COUNT(*) AS count FROM cart INNER JOIN orders_merch ON cart.cart_merch = orders_merch.cart_merch
		WHERE orders_merch.id=$id");
		$record1 = mysqli_fetch_array($rec1) or die( mysqli_error($conn));
		$count = $record1['count'];
	}

	if (isset($_GET['done']))
	  {
	    $id = $_GET['done'];
	    $status = "Done";

		mysqli_query($conn, "UPDATE orders_merch SET status = '$status' WHERE id=$id") or die( mysqli_error($conn));
		header('location: merch_history.php?donesuccess');
	  }

	if (isset($_GET['del']))
	{
		$id = $_GET['del'];

		mysqli_query($conn, "DELETE FROM orders_merch WHERE id=$id");
		header('location: merch_history.php?delete');
	}
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/icons/logo2.png">
	<link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dashboard.css" rel="stylesheet">
    <link href="assets/alert.css" rel="stylesheet">
	<script src="assets/alert.js"></script>	
    <title>Orders</title>

    <style>
      	th{
      		font-weight: normal;
      	}
    </style>
  </head>
  <body>
    
	<?php include 'header.php'?>

	<div class="container-fluid">
	  <div class="row">
	    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
	      <div class="position-sticky pt-3">
	        <ul class="nav flex-column">
	          <li class="nav-item" style="margin-top:10px">
	            <a class="nav-link" aria-current="page" href="admin.php">
	              <img src="assets/icons/dashboard.png" height="15px" style="margin-bottom:4px">
	              Dashboard 
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link active" href="orders.php">
	              <img src="assets/icons/orders.png" height="15px" style="margin-bottom:4px">
	              Orders
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="orders_commission.php">
	              <img src="assets/icons/request.png" height="15px" style="margin-bottom:4px">
	              Requests
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="account.php">
	              <img src="assets/icons/account.png" height="15px" style="margin-bottom:4px">
	              Account
	            </a>
	          </li>
	        </ul>

	        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
	          <span>Content Management System</span>
	          <a class="link-secondary" href="#" aria-label="Add a new report">
	          </a>
	        </h6>
	        <ul class="nav flex-column mb-2">
	          <li class="nav-item">
	            <a class="nav-link" href="portfolio.php">
	              <img src="assets/icons/portfolio.png" height="15px" style="margin-bottom:4px">
	              Portfolio
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="anc.php">
	              <img src="assets/icons/anc.png" height="15px" style="margin-bottom:4px">
	              About & Contacts
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="merch.php">
	              <img src="assets/icons/merch.png" height="15px" style="margin-bottom:4px">
	              Merch
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="commission.php">
	              <img src="assets/icons/commission.png" height="15px" style="margin-bottom:4px">
	              Commission
	            </a>
	          </li>

	        </ul>
	      </div>
	    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Processed Orders</h1>
        <div class="btn-group mr-2">
            <a href="orders.php" class="btn btn-sm btn-outline-secondary">Pending Orders</a>
          </div>
      </div>

      	<?php
	      	if (isset($_GET["delete"])) 
		      	{
		          echo "<div class='alert alert-success alert-dismissible'>
		          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		          Merch Order successfully deleted!
		          </div>";
			  	}
			elseif (isset($_GET["donesuccess"])) 
		      	{
		          echo "<div class='alert alert-success alert-dismissible'>
		          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		          Merch Order successfully updated!
		          </div>";
			}
	    ?>

      <div class="table-responsive">	
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Status</th>
              <th>Email</th>
              <th>Name</th>
              <th>Total Price</th>
              <th>Order Date</th>
              <th colspan="2">Actions</th>
            </tr>
          </thead>
          <tbody>
          	<?php while ($row = mysqli_fetch_array($results1)) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['total_price']; ?></td>
              <td><?php echo $row['order_date']; ?></td>
              <td><a href="merch_history.php?details=<?php echo $row['id']; ?>">Items</a></td>
              <?php if($row['status'] == 'Processing') { ?>
              <td><a onclick="location.href='mailto:<?php echo $row['email']; ?>?subject=Zgartworks Merch Order Status&body=Hi <?php echo $row['name']; ?>! Your Merch Order has been shipped out. Your JNT tracking number is #G23AQWE80X, you can track your parcel on their website. Have a good day!';" href="merch_history.php?done=<?php echo $row['id']; ?>" target="_self">Done</a></td>
              <?php } else{ ?>
              <td><a href="merch_history.php?del=<?php echo $row['id']; ?>">Delete</a></td>
              <?php } ?>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    <?php if ($items_state == true):{ ?>
    <hr>
      <h5 style="margin-top:20px">Order #<?php echo $id; ?>:</h5>

      	<div class="row">
      		<div class="col-md-6 mb-3">
	          <label for="style_name">Number of items</label>
	          <input type="text" class="form-control" value="<?php echo $count; ?>" readonly/>
	        </div>

      		<div class="col-md-6 mb-3">
	          <label for="inclusion">Total Price</label>
	          <input type="text" class="form-control" value="<?php echo $sum; ?>" readonly/>
	        </div>
	    </div>

      <div class="table-responsive">	
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Item ID</th>
              <th>Type of Merch</th>
              <th>Item Name</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
          	<?php while ($row = mysqli_fetch_array($results2)) {?>
            <tr>
              <td><?php echo $row['merch_id']; ?></td>
              <td><?php echo $row['type_name']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['price']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

  <?php } 
	elseif ($items_state == false):{

	}
	endif; ?>

    </main>

  </div>
</div>

<div style="margin-top:100px">
<?php include 'footer.php'?>
</div>

  </body>
</html>
