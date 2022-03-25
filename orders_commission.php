<?php
	include 'includes/db.inc.php';
	$results = mysqli_query($conn, "SELECT * FROM orders_commission WHERE status = 'Pending' ") or die( mysqli_error($conn));

	$style_name = "";
	$description = "";
	$inclusion = "";
	$references = "";
	$price = "";

	if (isset($_GET['details']))
	{
		$id = $_GET['details'];
		$rec1 = mysqli_query($conn, "SELECT * FROM style INNER JOIN commission ON commission.style = style.id INNER JOIN orders_commission ON commission.id = orders_commission.commission_id WHERE orders_commission.id=$id");
		$record1 = mysqli_fetch_array($rec1);

		$style_name = $record1['style_name'];
		$description = $record1['description'];
		$inclusion = $record1['inclusion'];
		$price = $record1['price'];
		$references = $record1['reference'];
	}

	if (isset($_GET['accept']))
	  {
	    $id = $_GET['accept'];
	    $status = "Processing";

		mysqli_query($conn, "UPDATE orders_commission SET status = '$status' WHERE id=$id") or die( mysqli_error($conn));

		header('location: orders_commission.php?acceptsuccess='.$id.'');
	  }

	if (isset($_GET['decline']))
	  {
	    $id = $_GET['decline'];
	    $status = "Declined";

		mysqli_query($conn, "UPDATE orders_commission SET status = '$status' WHERE id=$id") or die( mysqli_error($conn));
		header('location: orders_commission.php?declinesuccess='.$id.'');
	  }
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>Commission Requests</title>
	<link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dashboard.css" rel="stylesheet">
    <link href="assets/alert.css" rel="stylesheet">
	<script src="assets/alert.js"></script>	

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
	            <a class="nav-link" href="orders.php">
	              <img src="assets/icons/orders.png" height="15px" style="margin-bottom:4px">
	              Orders
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link active" href="orders_commission.php">
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
        <h1 class="h2">Pending Commissions</h1>
        <div class="btn-group mr-2">
            <a href="commission_history.php" class="btn btn-sm btn-outline-secondary">Processed Commissions</a>
          </div>
      </div>

      <?php
	      	if (isset($_GET["acceptsuccess"])) 
		      	{
		      	  $id = $_GET['acceptsuccess'];
		          echo "<div class='alert alert-success alert-dismissible'>
		          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		          You have accepted Commission Request #". $id ."!<br>
		          Proceed to <a style='text-decoration:none' href='commission_history.php'>Processed Commissions</a>
		          </div>";
			  	}
			elseif (isset($_GET["declinesuccess"])) 
		      	{
		      	  $id = $_GET['declinesuccess'];
		          echo "<div class='alert alert-success alert-dismissible'>
		          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		          You have declined Commission Request #". $id ."!<br>
		          Proceed to <a style='text-decoration:none' href='commission_history.php'>Processed Commissions</a>
		          </div>";
			}
	    ?>

      		<div class="row">
      		<div class="col-md-3 mb-3">
	          <label for="style_name">Style</label>
	          <input type="text" class="form-control" name="style_name" id="style_name" value="<?php echo $style_name; ?>" readonly/>
	        </div>

      		<div class="col-md-6 mb-3">
	          <label for="inclusion">Inclusion</label>
	          <input type="text" class="form-control" name="inclusion" id="inclusion" value="<?php echo $inclusion; ?>" readonly/>
	        </div>

	        <div class="col-md-3 mb-3">
	          <label for="inclusion">Price</label>
	          <input type="text" class="form-control" name="inclusion" id="inclusion" value="<?php echo $price; ?>" readonly/>
	        </div>
	    	</div>

	        <div class="col-md-12 mb-3">
	          <label for="description">Description</label>
	          <textarea class="form-control" name="description" id="description" style="resize:none; height:80px" readonly><?php echo $description; ?></textarea>
	        </div>

	        <div class="col-md-12 mb-3">
	          <label for="references">References</label>
	         <textarea class="form-control" name="references" id="references" style="resize:none; height:60px" readonly><?php echo $references; ?></textarea>
	        </div>

      <div class="table-responsive">	
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Status</th>
              <th>Email</th>
              <th>Name</th>
              <th>Rushed</th>
              <th>Purpose</th>
              <th>Order Date</th>
              <th colspan="3">Actions</th>
            </tr>
          </thead>
          <tbody>
          	<?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['rushed']; ?></td>
              <td><?php echo $row['purpose']; ?></td>
              <td><?php echo $row['order_date']; ?></td>
              <td><a href="orders_commission.php?details=<?php echo $row['id']; ?>">Details</a></td>

              <td><a onclick="location.href='mailto:<?php echo $row['email']; ?>?subject=Zgartworks Commission Request Confirmation&body=Hi <?php echo $row['name']; ?>! Your Commission Request has been accepted. Reply to this email to further discuss the Commission Details and Rates. Have a good day!';" href="orders_commission.php?accept=<?php echo $row['id']; ?>" target="_self">Accept</a></td>

              <td><a onclick="location.href='mailto:<?php echo $row['email']; ?>?subject=Zgartworks Commission Request Confirmation&body=Hi <?php echo $row['name']; ?>! We regret to inform you that your Commission Request has been declined. This can be due to Commission Details Conflict or Personal Issue. You can reply to this email to further discuss arrangements or if you have any inquiries! Have a good day.';" href="orders_commission.php?decline=<?php echo $row['id']; ?>" target="_self">Decline</a></td>

            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    </main>

  </div>
</div>

<div style="margin-top:100px">
<?php include 'footer.php'?>
</div>

  </body>
</html>
