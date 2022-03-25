<?php

  include 'includes/db.inc.php';
  $result = $conn->query("SELECT * FROM anc")  ;
  $result1 = $conn->query("SELECT * FROM socials")  ;

?>
  
<html>  
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>About</title>
  <link href="assets/bootstrap.min.css" rel="stylesheet">
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
    .pm{
      margin-top: -10px;
    } 
    </style>
  </head>

  <body>
    <header>
    
    </header>
 
<main role="main">

  <div class="container">

      <div class="row">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-group mr-2">
            <a href="cover.php" class="btn btn-sm">Back</a>
         </div>
         <h2 style=" ">About and Contacts</h2>
      </div>
      </div>

      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="assets/icons/logo.png" alt="" width="200" height="200">
        <?php while ($row = mysqli_fetch_array($result)) { ?>
        <p class="lead"><?php echo nl2br($row['about']); ?></p>
      </div>

      <div class="py-5 text-center">
        <p class="lead" style="margin-top:-30px;font-size:30px">Contacts</p>
        <p class="pm"><strong>Email: </strong><?php echo ($row['email']); ?></p>
        <p class="pm"><strong>Phone Number: </strong><?php echo ($row['phone']); ?></p>
      <?php }?>
      <?php while ($row = mysqli_fetch_array($result1)) { ?>
            &nbsp;<a id="socmed" href="<?php echo ($row['url']); ?>" style="text-decoration: none;"><?php echo ($row['site']); ?></a>&nbsp;
          <?php }?> 
      </div>

  </div>
    <hr>
    
</main>
</body>

<script>
 
</script>

</html>
