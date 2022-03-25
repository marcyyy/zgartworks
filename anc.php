<?php
  include 'includes/anc.inc.php';
  include 'includes/socials.inc.php';

  include 'includes/db.inc.php';

  $rec = mysqli_query($conn, "SELECT * FROM anc");
	$record = mysqli_fetch_array($rec);

	$about = $record['about'];
	$email = $record['email'];
	$phone = $record['phone'];
	$id2 = $record['id'];

	if (isset($_GET['edit']))
	{
		$id = $_GET['edit'];
		$edit_state = true;
		$rec1 = mysqli_query($conn, "SELECT * FROM socials WHERE id=$id");
		$record1 = mysqli_fetch_array($rec1);

		$site = $record1['site'];
		$url = $record1['url'];
		$id = $record1['id'];
	}

?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/icons/logo2.png">
	<link href="assets/bootstrap.min.css" rel="stylesheet">
	<link href="assets/alert.css" rel="stylesheet">
    <link href="assets/dashboard.css" rel="stylesheet">
	<script src="assets/alert.js"></script>
    <title>About & Contacts</title>
	
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
	            <a class="nav-link active" href="anc.php">
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
        <h1 class="h2">About & Contacts</h1>
      </div>

      	<?php
		      if (isset($_GET["updateanc"])) {
		          echo "<div class='alert alert-success alert-dismissible'>
		          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		          About & Contacts successfully updated!<br>Check the change/s on the <a href='about.php' style='text-decoration:none' target='_blank'>website.</a>
		          </div>";
		      }
		?>

      <form method="post" action="includes/anc.inc.php" enctype="multipart/form-data">
      	<input type="hidden" name="id" value="<?php echo $id2; ?>">
	        <div class="col-md-12 mb-3">
	          <label for="about">About</label>
	          <textarea class="form-control" name="about" id="about" style="resize:none; height:150px" required><?php echo $about; ?></textarea>
	        </div>

	        <div class="row">
	        <div class="col-md-6 mb-3">
	          <label for="email">Email</label>
	          <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" required/>
	        </div>

	        <div class="col-md-6 mb-3">
	          <label for="phone">Phone Number</label>
	          <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>" required/>
	        </div>	
	    	</div>
      <hr>
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="update" value="Update">
      </form>


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Socials</h1>
      </div>

      	<?php
		      if (isset($_GET["add"])) {
		          echo "<div class='alert alert-success alert-dismissible'>
		          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		          Social Media Account Link successfully added!<br>Check the change/s on the <a href='about.php' style='text-decoration:none' target='_blank'>website.</a>
		          </div>";
		      }
		      elseif (isset($_GET["update"])) {
		          echo "<div class='alert alert-success alert-dismissible'>
		          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		          Social Media Account Link successfully updated!<br>Check the change/s on the <a href='about.php' style='text-decoration:none' target='_blank'>website.</a>
		          </div>";
		      }
		      elseif (isset($_GET["delete"])) {
		          echo "<div class='alert alert-success alert-dismissible'>
		          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		          Social Media Account Link successfully deleted!<br>Check the change/s on the <a href='about.php' style='text-decoration:none' target='_blank'>website.</a>
		          </div>";
		      }
	  	?>

      <form method="post" action="includes/socials.inc.php" enctype="multipart/form-data">
      	<input type="hidden" name="id" value="<?php echo $id; ?>">
      		<div class="row">
      		<div class="col-md-4 mb-3">
	          <label for="site">Website</label>
	          <input type="text" class="form-control" name="site" id="site" value="<?php echo $site; ?>" required/>
	        </div>

	        <div class="col-md-7 mb-3">
	          <label for="url">URL<span class="text-muted">  (https://www.websitename.com/handle)</span></label>
	          <input type="text" class="form-control" name="url" id="url" value="<?php echo $url; ?>" required/>
	        </div>

	        <div class="col-md-1 mb-3">
	          <?php if ($edit_state == false): ?>
	          	<input type="submit" class="btn btn-sm btn-outline-secondary" name="save" value="Add" style="margin-top:21px;padding:6px 20px ">
	          <?php else: ?>	
	          	<input type="submit" class="btn btn-sm btn-outline-secondary" name="update" value="Update" style="margin-top:21px;padding:6px 15px ">
	          <?php endif ?>
	        </div>
	    	</div>

     </form>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Website</th>
              <th>URL</th>
              <th colspan="2">Actions</th>
            </tr>
          </thead>
          <tbody>
          	<?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
              <td><?php echo $row['site']; ?></td>
              <td><?php echo $row['url']; ?></td>
              <td><a href="anc.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
              <td><a href="includes/socials.inc.php?del=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

<?php include 'footer.php'?>

  </body>
</html>
