<?php
  include 'includes/merch_update.inc.php';

  include 'includes/db.inc.php';
  $result = $conn->query("SELECT * FROM merch_type")  ;

  if (isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($conn, "SELECT * FROM merch WHERE id=$id");
    $record = mysqli_fetch_array($rec);

    $type = $record['type'];
    $title = $record['title'];
    $description = $record['description'];
    $price = $record['price'];
    $image = $record['image'];
    $id = $record['id'];
  }

?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/icons/logo2.png">
    <link href="assets/alert.css" rel="stylesheet">
    <script src="assets/alert.js"></script>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dashboard.css" rel="stylesheet">
    <title>Merch</title>

    <style>
      .imgcenter{
        display: block;
        margin: auto;
        max-width: 85vw;
        max-height: 85vh;
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
              <a class="nav-link" href="anc.php">
                <img src="assets/icons/anc.png" height="15px" style="margin-bottom:4px">
                About & Contacts
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="merch.php">
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
        <h1 class="h2">Merch</h1>
            <a href="merch.php" class="btn btn-sm btn-outline-secondary">Back</a>
      </div>

      <?php
      if (isset($_GET["upload"])) {
        if ($_GET["upload"] == "success") {
          echo "<div class='alert alert-success alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          Merch uploaded successfully!<br>Check the change/s on the <a href='store.php' style='text-decoration:none' target='_blank'>website.</a>
          </div>";
        }
        else if ($_GET["upload"] == "update") {
          echo "<div class='alert alert-success alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          Merch updated successfully!<br>Check the change/s on the <a href='store.php' style='text-decoration:none' target='_blank'>website.</a>
          </div>";
        }
        else if ($_GET["upload"] == "delete") {
          echo "<div class='alert alert-success alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          Merch deleted successfully!<br>Check the change/s on the <a href='store.php' style='text-decoration:none' target='_blank'>website.</a>
          </div>";
        }
      }
      ?>

      <form method="post" action="includes/merch_update.inc.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="col-md-12 mb-3">
          <?php if ($edit_state == true):
        echo "<img class='imgcenter' src='includes/merch/".$image."' height='400px' onerror='this.src='assets/icons/logo.jpg';'/>";
        endif?>
        </div>

        <?php if ($edit_state == false): ?>
        <?php else: ?>  
          <div class="row">
            <div class="col-md-4 mb-3">
            <label for="type">Type of Merch</label>
            <select  class="form-control" id="type" name="type" required>
               <?php while ($row = mysqli_fetch_array($result)) { ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['type_name']; ?></option>
            <?php } ?>
            </select>
        </div>
        
        <div class="col-md-5 mb-3">
          <label for="title">Name</label>
          <input type="text" class="form-control" name="title" id="title" value="<?php echo $title; ?>" required/>
        </div>

        <div class="col-md-3 mb-3">
          <label for="price">Price</label>
          <input type="text" class="form-control" name="price" id="price" value="<?php echo $price; ?>" required/>
        </div>
      </div>

      <div class="row">
         <div class="col-md-11 mb-3">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" style="resize:none; height:60px" required><?php echo $description; ?></textarea>
        </div>
      

            <div class="col-md-1 mb-3">
                <input type="submit" class="btn btn-sm btn-outline-secondary" name="update" value="Update" style="margin-top:21px;padding:6px 15px ">
            </div>
          </div>

      <hr>
      <?php endif ?>
      </form>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Type of Merch</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th colspan="2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
              <td><?php echo $row['type_name']; ?></td>
              <td><?php echo $row['title']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td><a href="merch_update.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
              <td><a href="includes/merch_update.inc.php?del=<?php echo $row['id']; ?>">Delete</a></td>
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
