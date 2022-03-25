<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>Log In</title>

    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/alert.css" rel="stylesheet">
    <script src="assets/alert.js"></script>
    
    <style>
        body {
          font-family: Verdana, sans-serif;
        }
        .alert{
        position:fixed;
        z-index:2;
        right:50px;
        top:50px;
        }
        
    </style>

    <link href="assets/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">

  <form action="includes/login.inc.php" method="post">
    <img class="mb-4" src="assets/icons/3.1.png" alt="" style="margin-left:-65px;margin-top:10px" width="420">

    <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "wronglogin") {
          echo "<div class='alert alert-danger alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          Account doesn't exists!
          </div>";
        }
        else if ($_GET["error"] == "wrongpassword") {
          echo "<div class='alert alert-danger alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          Incorrect login password!
          </div>";
        }
      }
      if (isset($_GET["logout"])) {
          echo "<div class='alert alert-success alert-dismissible'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          You have logged out.
          </div>";
      }
    ?>

    <label for="username" class="visually-hidden">Username</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus style="margin-top:-25px">

    <label for="password" class="visually-hidden">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit" style="margin-top:10px">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; Avila & Jose 2021<br><a href="cover.php" style="text-decoration:none;font-size: 14px">zgartworks</a></p>
</main>


    
  </body>
</html>
