<?php
	
	include 'includes/db.inc.php';

	$result1 = mysqli_query($conn, "SELECT COUNT(id) AS count FROM orders_commission WHERE orders_commission.status = 'Pending' "); 
	$row1 = mysqli_fetch_assoc($result1); 
	$count1 = $row1['count'];

	$result2 = mysqli_query($conn, "SELECT COUNT(id) AS count FROM orders_merch WHERE orders_merch.status = 'Pending' "); 
	$row2 = mysqli_fetch_assoc($result2); 
	$count2 = $row2['count'];

	$result3 = mysqli_query($conn, "SELECT COUNT(id) AS count FROM merch "); 
	$row3 = mysqli_fetch_assoc($result3); 
	$count3 = $row3['count'];

	$result4 = mysqli_query($conn, "SELECT COUNT(id) AS count FROM portfolio "); 
	$row4 = mysqli_fetch_assoc($result4); 
	$count4 = $row4['count'];
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/icons/logo2.png">
	<link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dashboard.css" rel="stylesheet">
    <title>Dashboard</title>

  </head>
  <body onload="loginSuccess()">
    
	<?php include 'header.php'?>

	<div class="container-fluid">
	  <div class="row">
	    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
	      <div class="position-sticky pt-3">
	        <ul class="nav flex-column">
	          <li class="nav-item" style="margin-top:10px">
	            <a class="nav-link active" aria-current="page" href="admin.php">
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
	      		<div class="row" style="margin-top:20px;">
		          <div class="col-md-3">
		            <div class="card mb-3 shadow-sm" >
		              <div class="card-body" >
		                <img src="assets/icons/cart.png" width="35px" style="float:left">
		                <h6 style="text-align: right">Pending Merch<br>Orders</h6>
		                <div class="d-flex justify-content-between align-items-center">
		                  <div class="btn-group" style="margin-top:10px">
		                    <a class="btn btn-sm btn-outline-secondary" href="orders.php">View</a>
		                  </div>
		                  <h4 style="margin-top:20px;color:#007bff"><?php echo $count2; ?></h4>
		                </div>
		              </div>
		            </div>
		          </div>
	      		<div class="col-md-3">
		            <div class="card mb-3 shadow-sm" >
		              <div class="card-body" >
		                <img src="assets/icons/merch.png" width="35px" style="float:left">
		                <h6 style="text-align: right">Total Items<br>on Merch</h6>
		                <div class="d-flex justify-content-between align-items-center">
		                  <div class="btn-group" style="margin-top:10px">
		                    <a class="btn btn-sm btn-outline-secondary" href="merch_update.php">View</a>
		                  </div>
		                  <h4 style="margin-top:20px;color:#007bff"><?php echo $count3; ?></h4>
		                </div>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3">
		            <div class="card mb-3 shadow-sm" >
		              <div class="card-body" >
		                <img src="assets/icons/request.png" width="35px" style="float:left">
		                <h6 style="text-align: right">Pending Commission<br>Requests</h6>
		                <div class="d-flex justify-content-between align-items-center">
		                  <div class="btn-group" style="margin-top:10px">
		                    <a class="btn btn-sm btn-outline-secondary" href="orders_commission.php">View</a>
		                  </div>
		                  <h4 style="margin-top:20px;color:#007bff"><?php echo $count1; ?></h4>
		                </div>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3">
		            <div class="card mb-3 shadow-sm" >
		              <div class="card-body" >
		                <img src="assets/icons/portfolio.png" width="35px" style="float:left">
		                <h6 style="text-align: right">Total Images<br>on Portfolio</h6>
		                <div class="d-flex justify-content-between align-items-center">
		                  <div class="btn-group" style="margin-top:10px">
		                    <a class="btn btn-sm btn-outline-secondary" href="portfolio_update.php">View</a>
		                  </div>
		                  <h4 style="margin-top:20px;color:#007bff"><?php echo $count4; ?></h4>
		                </div>
		              </div>
		            </div>
		          </div>
	      </div>

	      		<h2 style="text-align: center"></h2>
	          	

	      		<img src="assets/icons/logo.png" width="120px" style="margin-top:300px; display: block; margin-left: auto; margin-right: auto;">
	      		<h6 class="text-muted" style="text-align:center;font-size:15px"><a href="cover.php" style="text-decoration:none">View Website</a></h6>
	           
    </main>
  </div>
</div>

  </body>

  <script>
  	function loginSuccess(){
  		<?php if (isset($_GET["success"])) {?>			
  		alert("Welcome back!");
  		<?php } else{} ?>	
	}	

  </script>

  <?php include 'footer.php'?>
</html>
