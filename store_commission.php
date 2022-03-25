<?php

  include 'includes/db.inc.php';
  
  $result1 = $conn->query("SELECT * FROM style INNER JOIN commission ON commission.style = style.id")  ;
  $result2 = $conn->query("SELECT * FROM style INNER JOIN portfolio ON portfolio.pf_style = style.id")  ;
  $result3 = $conn->query("SELECT * FROM style ORDER BY id");

  $rec = mysqli_query($conn, "SELECT * FROM tos");
  $record = mysqli_fetch_array($rec);

  $status = $record['commission_status'];

?>
	
<html>  
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>Commission</title>
  <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/album.css" rel="stylesheet">
    <link href="assets/carousel.css" rel="stylesheet">

    <style>
      iframe{
      display: none;
    }
    .active{
      background-color: transparent;
      color:blue;
    }
    .cover {
      background-image:url('images/cover2.jpg');
      background-size: cover; 
      background-position: center;
    }
    </style>

  </head>

  <body>
    <header>
    
    </header>
 
<main role="main">

  <div class="container marketing">

    <div class="row ">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-group mr-2">
            <a href="cover.php" class="btn btn-sm">Back</a>
         </div>
        <h2 style=" ">Online Store</h2>
        <div class="btn-group mr-2">
            <a href="store.php" class="btn btn-sm">Merch</a>
            <a href="store_commission.php" class="btn btn-sm active">Commission</a>
            <a href="cart.php" class="btn btn-sm " ><img src="assets/icons/orders.png" height="20px"></a>
         </div>
      </div>

    </div>
  </div>

  <div class="container">
      <!--<div class="row featurette">
      <img src="images/1.jpg" style="display: block; margin: auto;  max-width: 100vw; max-height: 100vh;">

      <hr class="featurette-divider">
      </div>-->
     
      <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center cover" >
          <div class="col-md-5 p-lg-5 mx-auto my-5">
              <h1  style="color:#fff">Commissions Open!</h1>
              <p class="lead font-weight-normal" style="color:#fff">Please read our terms of service first</p>
              <a class="btn btn-outline-primary" href="tos.php" style="color:#fff" target="_blank">Terms of Service</a>
          </div>
          <div class="product-device shadow-sm d-none d-md-block"></div>
          <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
      </div>

    <div class="row" > 
        <div class="btn-group mr-2">
          <?php while ($row = mysqli_fetch_array($result3)) { ?>
              <a href="#" class="btn btn-sm " style="font-size:20px"><?php echo $row['style_name']; ?></a>
          <?php } ?>
        </div>
    </div>

    <hr>

    <div class="row" >
    <?php while ($row = mysqli_fetch_array($result1)) { ?>
          <div class="col-md-4">
            <div class="card mb-3 shadow-sm" >
              <div class="card-body" >
                <h3><?php echo $row['style_name']; ?></h3>
                <!--?php echo "<img src='includes/portfolio/".$row['image']."' width='100%' height='100%'/>"; ?-->
                <p class="card-text" >Inclusions: <?php echo $row['inclusion']; ?></p>
                <p class="card-text" style="margin-top:-15px">Turn Around Time: <?php echo $row['tat']; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary" href="cart_commission.php?pass=<?php echo $row['id']; ?>">Continue</a>
                  </div>
                  <small class="text-muted">₱ <?php echo $row['price']; ?></small>
                </div>
              </div>
            </div>
          </div>
    <?php } ?>
      </div>

  </div>



  <!-- FOOTER -->
  <hr class="featurette-divider">
  <footer class="container" style="text-align:center">
    <div class="inner">
      <p><a href="https:/instagram.com/zgartworks">Instagram</a> | <a href="https://twitter.com/zgartworks">Twitter</a> | <a href="https://facebook.com/Zgartworks">Facebook</a></p>
    </div>
    <iframe name="frame"></iframe>
  </footer>

</main>
</body>

<script>

</script>

</html>
