<?php 
  include('includes/cart.inc.php');

  include 'includes/db.inc.php';

  $rec1 = mysqli_query($conn, "SELECT max(cart_merch) as max_cart FROM cart");
  $record1 = mysqli_fetch_array($rec1) or die( mysqli_error($conn));
  $max_cart = $record1['max_cart'];

  $result1 = $conn->query("SELECT * FROM merch_type INNER JOIN merch ON merch_type.id = merch.type INNER JOIN cart ON merch.id = cart.merch_id WHERE cart.cart_merch = $max_cart");

  $result2 = mysqli_query($conn, "SELECT SUM(price) AS total FROM merch INNER JOIN cart ON merch.id = cart.merch_id WHERE cart.cart_merch = $max_cart"); 
  $row2 = mysqli_fetch_assoc($result2); 
  $sum = $row2['total'];

  $result3 = mysqli_query($conn, "SELECT COUNT(id) AS count FROM cart WHERE cart.cart_merch = $max_cart"); 
  $row3 = mysqli_fetch_assoc($result3); 
  $count = $row3['count'];

  if (isset($_SESSION['substate'])):
    $submit_state = $_SESSION['substate'];
  endif;

  if (isset($_GET['del']))
  {
    $id = $_GET['del'];

    mysqli_query($conn, "DELETE FROM cart WHERE id=$id");
    header('location: cart.php?delete');
  }

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/logo2.png">
    <link href="assets/alert.css" rel="stylesheet">
    <script src="assets/alert.js"></script> 
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <title>Checkout</title>

    <style>
      .alert{
        position:fixed;
        z-index:2;
        right:50px;
        top:50px;
      }
    </style>

  </head>
  <body class="bg-light">
    <div class="container">

        <?php
          if (isset($_GET["delete"])) {
              echo "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              Item successfully removed from your cart.
              </div>";
            }
        ?>

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="store.php" class="btn btn-sm btn-outline-secondary" style="font-size:15px; margin-top:5px; margin-bottom:15px">Back</a>
        <h1 class="h2">Checkout</h1>
      </div>

  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="assets/icons/orders.png" alt="" height="60">
    <p class="lead">Please check your item orders and input your contact information!<br>We'll contact you on your email.</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
    <?php if ($submit_state == true):
      { ?>
        <span><?php echo $count; ?></span>
      </h4>

      <ul class="list-group mb-3">  
      <?php while ($row = mysqli_fetch_array($result1)) { ?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?php echo $row['title']; ?></h6>
            <small class="text-muted"><?php echo $row['type_name']; ?></small>
          </div>
          <span style="margin-top:8px">₱ <?php echo $row['price']; ?><a href="cart.php?del=<?php echo $row['id']; ?>"><img src="assets/icons/trash_can.png" width="16px" style="margin-top:-9px;margin-left:12px"></a></span>
        </li>
        <?php }?>
        
        <li class="list-group-item d-flex justify-content-between">
          <span>Total</span>
          <strong style="margin-right:27px">₱ <?php echo $sum; ?></strong>
        </li>
      </ul>
    <?php }
    elseif ($submit_state == false):{?>
      <span>0</span>
      </h4>

      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between">
          <span>Total</span><strong>₱ 0</strong>
        </li>
      </ul>
    <?php } endif;?>
    </div>

    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Contact Information</h4>

      <form method="post" action="includes/cart.inc.php" enctype="multipart/form-data"> 

        <input type="hidden" id="total" name="total" value="<?php echo $sum; ?>" required>

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

        <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Submit" />
      </form>

    </div>
  </div>

<hr class="mb-4">

  <footer class="container" style="text-align:center">
    <div class="inner">
      <p><a href="https:/instagram.com/zgartworks">Instagram</a> | <a href="https://twitter.com/zgartworks">Twitter</a> | <a href="https://facebook.com/Zgartworks">Facebook</a></p>
    </div>
    <iframe name="frame"></iframe>
  </footer>

</div>
</body>
</html>
