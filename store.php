<?php

  include 'includes/db.inc.php';
  $result = $conn->query("SELECT * FROM merch_type")  ;
  $result1 = $conn->query("SELECT * FROM merch_type INNER JOIN merch ON merch.type = merch_type.id")  ;

  include('includes/cart.inc.php');

  if (isset($_SESSION['substate'])):
		$submit_state = $_SESSION['substate'];
  endif;
?>
	
<html>	
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>Merch Store</title>
	<link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/carousel.css" rel="stylesheet">
    <link href="assets/alert.css" rel="stylesheet">
	 <script src="assets/alert.js"></script>

    <style>
    	iframe{
		  display: none;
		}
		.active{
			background-color: transparent;
			color:blue;
		}
		.alert{
	      position:fixed;
	      z-index:2;
	      right:50px;
	      top:50px;
	    }
	    .imgcenter:hover {
      opacity: 0.5;
    }

    .divcenter {
    width: 250px;
    height: 250px;
    overflow: hidden;
    margin: 10px;
    position: relative;

    }
    .imgcenter {
    position: absolute;
    left: -1000%;
    right: -1000%;
    top: -1000%;
    bottom: -1000%;
    margin: auto;
    min-height: 100%;
    min-width: 100%;
    object-fit: cover;
    }

    .modal {
      position: fixed; 
      padding: auto;
      display: none; 
      height: 100%;
    }

    .modal-backdrop
    {
        opacity:0.7;
    }

    .modal-content {
      margin: auto;
      display: block;
    }

    .modal-content, #caption {  
      -webkit-animation-name: zoom;
      -webkit-animation-duration: 0.6s;
      animation-name: zoom;
      animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
      from {-webkit-transform:scale(0)} 
      to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
      from {transform:scale(0)} 
      to {transform:scale(1)}
    }

    @media only screen and (max-width: 700px){
      .modal-content {
        width: 100%;
      }
    }

    </style>
  </head>

  <body>
	  <header>
		
	  </header>
 
<main role="main">

  <div class="container marketing">

  	<?php
      if (isset($_GET["add"])) {
          echo "<div class='alert alert-success alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          Item added to cart!
          </div>";
        }
      elseif (isset($_GET["success"])) {
          echo "<div class='alert alert-success alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Merch Order</strong> successfully sent!<br>Wait for our response on your email.<br>Thank you!
          </div>";
        }
    ?>

    <div class="row">
    	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       	<div class="btn-group mr-2">
            <a href="cover.php" class="btn btn-sm">Back</a>
         </div>
        <h2 style="margin-left:150px">Online Store</h2>
        <div class="btn-group mr-2">
            <a href="store.php" class="btn btn-sm active">Merch</a>
            <a href="store_commission.php" class="btn btn-sm ">Commission</a>
            <a href="cart.php" class="btn btn-sm " ><img src="assets/icons/orders.png" style="margin:auto;" height="20px"></a>
         </div>
      </div>

       <div class="btn-group mr-2">
      <?php while ($row = mysqli_fetch_array($result)) { ?>
      		<a href="#" class="btn btn-sm "  style="font-size:20px"><?php echo $row['type_name']; ?></a>
	  <?php } ?>
		</div>

    </div>

    <hr>
    <?php 

	    if ($submit_state == false):
		{ 
			$rec = mysqli_query($conn,"SELECT max(cart_merch)+1 as cart_merch FROM cart") or die( mysqli_error($conn));
			$record = mysqli_fetch_array($rec);
			$cart_merch = $record['cart_merch'];
		}
	elseif ($submit_state == true):
		{ 
			$rec = mysqli_query($conn,"SELECT max(cart_merch) as cart_merch FROM cart") or die( mysqli_error($conn));
			$record = mysqli_fetch_array($rec);
			$cart_merch = $record['cart_merch'];
		}
		endif;
	?>

    <div class="container" >
      <div class="row" >
		<?php while ($row = mysqli_fetch_array($result1)) { 
			 $imgsrc = "includes/merch/".$row['image'];?>
	        <div class="col-md-3">
	        	<form method="post" action="includes/cart.inc.php" enctype="multipart/form-data" target="frame" >
	          <div class="card mb-3 shadow-sm" >
	          	<button data-id="<?php echo $row['id'];?>" class="userinfo" style="background-color:transparent; border:none; outline:none;">
	          		 <img src='<?php echo $imgsrc;?>' width='100%' height='100%' style="margin-top:5px"/></button>
	            <div class="card-body" >
	            	<h6><?php echo $row['title']; ?></h6>
	              <p class="card-text" style="font-size: 13px"><?php echo $row['description']; ?></p>
	              <div class="d-flex justify-content-between align-items-center">
	                <div class="btn-group">
	                  <input type="hidden" name="merch_id" value="<?php echo $row['id']; ?>">
	                  <input type="hidden" name="cart_merch" value="<?php echo $cart_merch; ?>">
	                  <input type="submit" class="btn btn-sm btn-outline-secondary" name="save" value="Add to cart" />
	                </div>
	                <small class="text-muted">₱ <?php echo $row['price']; ?></small>
	              </div>
	            </div>
	          </div>
	    	</form>
	        </div>

		<?php } ?>
      </div>
    </div>
  </div>

  <!-- Modal -->
          <div class="modal modal-body" id="empModal">
            <div class="modal-content">
            </div>
         </div>

  <hr>
  <!-- FOOTER -->
  <footer class="container" style="text-align:center">
      <div class="inner">
        <p>
          <?php 
            $fooresult = $conn->query("SELECT * FROM socials");
                while ($row = mysqli_fetch_array($fooresult)) { ?>
                       &nbsp;<a href="<?php echo ($row['url']); ?>" style="text-decoration: none;"><?php echo ($row['site']); ?></a>&nbsp;
          <?php }?> 
        </p>
      </div>
    <iframe name="frame"></iframe>
  </footer>

</main>
</body>

<script>
	$(document).ready(function(){

      $('.userinfo').click(function(){
          var id = $(this).data('id');

          $.ajax({
              url: 'includes/ajax_merch.php',
              type: 'post',
              data: {id: id},
              success: function(response){ 

              $('.modal-body').html(response); 

              $('#empModal').modal('show'); 
              }
	          });
	      });
	  });

	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	      slides[i].style.display = "none";  
	  }
	  for (i = 0; i < dots.length; i++) {
	      dots[i].className = dots[i].className.replace("active", "");
	  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	}
</script>

</html>
