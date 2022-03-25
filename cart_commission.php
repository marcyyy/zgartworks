<?php 
  include('includes/request.inc.php');

  include 'includes/db.inc.php';

  if (isset($_GET['pass']))
  {
    $id = $_GET['pass'];
    $rec1 = mysqli_query($conn, "SELECT * FROM style INNER JOIN commission ON commission.style = style.id WHERE commission.id=$id");
    $record1 = mysqli_fetch_array($rec1);

    $style = $record1['style_name']; 
    $inclusion = $record1['inclusion'];
    $tat = $record1['tat'];
    $price = $record1['price'];
    $id = $record1['id'];
  }

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>Commission Request</title>

    <link href="assets/bootstrap.min.css" rel="stylesheet">

    <style>
      th{
          font-weight: normal;
        }
    </style>

  </head>
  <body class="bg-light">
    <div class="container">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="store_commission.php" class="btn btn-sm btn-outline-secondary" style="font-size:15px; margin-top:5px; margin-bottom:15px">Back</a>
        <h1 class="h2">Commission Request</h1>
      </div>

  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="assets/icons/commission.png" alt="" width="60" height="60">
    <p class="lead">Please fill all the necessary information<br>We'll contact you on your email.</p>
  </div>

  <form method="post" action="includes/request.inc.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="row">

      <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Commission Details</h4>

              <div class="row">
              <div class="col-md-4 mb-3">
                <label>Art Style</label>
                <input type="text" class="form-control" value="<?php echo $style;?>" readonly>
              </div>

              <div class="col-md-3 mb-3">
                <label>Turn Around Time</label>
                <input type="text" class="form-control" value="<?php echo $tat;?>" readonly>
              </div>

              <div class="col-md-4 mb-3">
                <label>Price</label>
                <input type="text" class="form-control" value="<?php echo $price;?>" readonly>
              </div>
            </div>

              <div class="col-md-11 mb-3">
                  <label>Inclusion</label>
                  <input type="text" class="form-control" value="<?php echo $inclusion;?>" readonly/>
              </div>

              <div class="col-md-11 mb-3">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" id="description" style="resize:none; height:90px"required></textarea>
              </div>

              <div class="col-md-11 mb-3">
                  <label for="reference">References<span class="text-muted"> (Optional)</span></label>
                  <textarea class="form-control" name="reference" id="reference" style="resize:none; height:60px" ></textarea>
              </div> 

              <div class="row">
                <div class="col-md-9 mb-3">
                  <label for="purpose">Purpose</label>
                    <select  class="form-control" id="purpose" name="purpose" required>
                        <option value="Personal" selected>Personal</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                </div>

                 <div class="col-md-2 mb-3">
                  <label for="rushed">Rushed</label>
                    <select  class="form-control" id="rushed" name="rushed" required>
                        <option value="No" selected>No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>
            </div>

      </div>

      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="mb-3">Contact Information</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="fname">First name</label>
            <input type="text" class="form-control" id="fname" name="fname" value="" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="lname">Last name</label>
            <input type="text" class="form-control" id="lname" name="lname" value="" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="" required>
        </div>

        <div class="custom-control custom-checkbox" style="font-size:16px;margin-top:10px">
              <input id='tosHidden' type='hidden' value='No' name='tos'>  
              <input type="checkbox" class="custom-control-input" name="tos" value="yes" id="tos" >
              <label for="tos">I agree to the <a href="tos.php" target="_blank">terms of service</a></label>
        </div>

        <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Submit" style="margin-top:15px;float:right"/>
      </div>

  </div>
      </form>


<hr class="mb-4" style="margin-top:50px">

  <footer class="container" style="text-align:center">
    <div class="inner">
      <p><a href="https:/instagram.com/zgartworks">Instagram</a> | <a href="https://twitter.com/zgartworks">Twitter</a> | <a href="https://facebook.com/Zgartworks">Facebook</a></p>
    </div>
    <iframe name="frame"></iframe>
  </footer>

</div>
</body>
</html>
