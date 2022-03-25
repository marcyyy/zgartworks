<?php
  include 'includes/merch.inc.php';

  include 'includes/db.inc.php';
  $result = $conn->query("SELECT * FROM merch_type")  ;
?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/icons/logo2.png">
    <link href="assets/alert.css" rel="stylesheet">
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/dashboard.css" rel="stylesheet">
    <script src="assets/alert.js"></script>
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
            <div class="btn-group mr-2">
            <a href="merch_update.php" class="btn btn-sm btn-outline-secondary">Edit Merch</a>
            <a href="merch_type.php" class="btn btn-sm btn-outline-secondary">Add Type of Merch</a>
          </div>
      </div>

      <?php
      if (isset($_GET["upload"])) {
        if ($_GET["upload"] == "fail") {
          echo "<div class='alert alert-danger alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          There was a problem saving the merch.
          </div>";
        }
      }
      ?>

      <form method="post" action="includes/merch.inc.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="100000">
        <div class="col-md-12 mb-3">
        <img class="imgcenter" id="output" height="400px"/>
        </div>

        <div class="col-md-12 mb-3">                 
          <label for="image">Image</label>
          <div class="input-group">
            <input type="file" class="form-control" name="image" id="image"  onchange="loadFile(event)" required/>
          </div>
        </div>

      <div class="row">
        <div class="col-md-7 mb-3">
          <label for="title">Name</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Insert Name" required/>
        </div>

         <div class="col-md-5 mb-3">
            <label for="type">Type of Merch</label>
            <select  class="form-control" id="type" name="type" required>
               <?php while ($row = mysqli_fetch_array($result)) { ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['type_name']; ?></option>
            <?php } ?>
            </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="price">Price</label>
          <input type="text" class="form-control" name="price" id="price" placeholder="Insert Price" required/>
        </div>

         <div class="col-md-8 mb-3">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" placeholder="Insert Description" style="resize:none; height:60px" required></textarea>
        </div>
      </div>

      <hr>
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="upload" value="Submit">
      </form>

    </main>
  </div>
</div>
  
  <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>

<?php include 'footer.php'?>
  </body>
</html>
