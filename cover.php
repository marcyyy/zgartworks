<?php 
    include 'includes/db.inc.php';
?>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>Cover</title>

    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/cover.css" rel="stylesheet">

    <style>
      .cover {
        background-image:url('images/cover2.jpg');
        background-size: cover; 
        background-position: center;
      }
    </style>
  </head>
<body class="text-center cover">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
    <div class="inner" >
      <h3 class="masthead-brand"><a href="login.php" style="text-decoration: none;"><img src="assets/icons/logo3.png" height="35px" style="display: block;margin-left: auto; margin-right: auto;"></a></h3>
      <nav class="nav nav-masthead justify-content-center">
        <!--<a class="nav-link active" href="#">Home</a>-->
        <a class="nav-link" style="color:#f3f3f3" href="gallery.php">Portfolio</a>
        <a class="nav-link" style="color:#f3f3f3" href="store.php">Online Store</a>
        <a class="nav-link" style="color:#f3f3f3" href="about.php">Contacts</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner" >
    <h1 class="cover-heading" style="text-shadow: 1px 1px 5px #000000">Welcome to zgartworks</h1>
    <p class="lead" style="text-shadow: 1px 1px 2px #000000;">Zyrah Avila | Jo Ann Jose</p>
    <!--p class="lead">
      <a href="about.php" class="btn btn-lg btn-secondary">Learn More</a>
    </p-->
  </main>

  <footer class="mastfoot mt-auto" style="text-align:center">
      <div class="inner">
        <p>
          <?php 
            $fooresult = $conn->query("SELECT * FROM socials");
                while ($row = mysqli_fetch_array($fooresult)) { ?>
                       &nbsp;<a href="<?php echo ($row['url']); ?>" ><?php echo ($row['site']); ?></a>&nbsp;
          <?php }?> 
        </p>
      </div>
  </footer>


</div>
</body>
</html>
