<?php
  include 'includes/account.inc.php';

?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>Account</title>
	<link href="assets/bootstrap.min.css" rel="stylesheet">
	<link href="assets/alert.css" rel="stylesheet">
	<script src="assets/alert.js"></script>	

    <link href="assets/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
	<?php include 'header.php';
	$account_id = $_SESSION["userid"];

	$rec = mysqli_query($conn, "SELECT * FROM accounts WHERE account_id=$account_id");
	$record = mysqli_fetch_array($rec);

	$account_name = $record['account_username'];
	$account_password = $record['account_password'];?>

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
	            <a class="nav-link" href="orders_commission.php">
	              <img src="assets/icons/request.png" height="15px" style="margin-bottom:4px">
	              Requests
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link active" href="account.php">
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
        <h1 class="h2">Account</h1>
      </div>

      	<?php
		      if (isset($_GET["success"])) {
		          echo "<div class='alert alert-success alert-dismissible'>
		          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		          Account successfully updated!
		          </div>";
		      }
    	?>

      <form method="post" action="includes/account.inc.php" enctype="multipart/form-data">
      	<input type="hidden" name="id" value="<?php echo $account_id; ?>">

      	<div class="row">
	        <div class="col-md-6 mb-3">
	          <label for="username">Username</label>
	          <input type="text" class="form-control" name="username" id="username" value="<?php echo $account_name; ?>" required/>
	        </div>

	        <div class="col-md-6 mb-3">
	          <label for="password">Password</label>
	          <input type="password" class="form-control" name="password" id="password" value="<?php echo $account_password; ?>" required/>
	        </div>
    	</div>

      <hr>
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="update" value="Update">
      </form>

    </main>
  </div>
</div>

<div style="margin-top:100px">
<?php include 'footer.php'?>
</div>

  </body>
</html>
