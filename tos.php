<?php

  include 'includes/db.inc.php';
  $result = $conn->query("SELECT * FROM tos") ;

?>
	
<html>	
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>Terms of Service</title>
	 <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/album.css" rel="stylesheet">
    <link href="assets/carousel.css" rel="stylesheet">
    <link href="assets/others.css" rel="stylesheet">

    <style>
    	iframe{
		  display: none;
		}
		.active{
			background-color: transparent;
			color:blue;
		}
    .cover {
      background-image:url('images/cover.jpg');
      background-size: cover; 
      background-position: center;
      filter: brightness(80%);
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
        <h2 style="margin-top:35px;margin-bottom:20px">Terms of Service</h2>
      </div>

    </div>
  </div>

  <div class="container"> 
      <?php while ($row = mysqli_fetch_array($result)) { ?>
          <p class="lead text-muted"><?php echo nl2br($row['description']); ?></p>
          <p>
      <?php } ?>    
          <a href="mailto:zgartworks0@gmail.com?subject=Zgartworks Commission Request Inquiry" class="btn btn-primary my-2">Inquiries (Send Email)</a>
        </p>

  </div>

  <!-- FOOTER -->
  <hr class="featurette-divider">
  <footer class="container" style="text-align:center; margin-top:-90px; margin-bottom:-90px">
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
