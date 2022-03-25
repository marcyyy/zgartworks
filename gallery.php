<?php
  include 'includes/db.inc.php';  
  $result = $conn->query("SELECT * FROM portfolio")  ;

  $result2 = mysqli_query($conn, "SELECT COUNT(id) AS count FROM portfolio"); 
  $row2 = mysqli_fetch_assoc($result2); 
  $count = $row2['count'];

?>
  
<html>  
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/icons/logo2.png">
    <title>Portfolio</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/carousel.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

    <style>
      iframe{
      display: none;
    }
    .active{
      background-color: transparent;
      color:blue;
    }
    .cover {
      background-color:#f2f2f2;
      background-size: cover; 
      background-position: center;
    }
    .slidecenter{
        display: block;
        margin: auto;
        max-width: 85vw;
        max-height: 85vh;
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
        opacity:0.5;
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

    <div class="row">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-group mr-2">
            <a href="cover.php" class="btn btn-sm">Back</a>
         </div>
         <h2 style=" ">Portfolio</h2>
      </div>
    </div>

    <div class="slideshow-container cover">
      <?php while ($row = mysqli_fetch_array($result)) { ?>  
        <div class="mySlides">
          <div class="numbertext" style="color:#212121"><?php echo $row['id']; ?> / <?php echo $count; ?></div>
          <?php echo "<img class='slidecenter' src='includes/portfolio/".$row['pf_image']."' height='100%'/>"; ?>
        </div>
      <?php } ?>  

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

  </div>
    
  <br>

    <div class="container" >
        <?php 
        $result3 = $conn->query("SELECT * FROM style ORDER BY id"); 
        while ($row = mysqli_fetch_array($result3)) { 
        $s_name = $row['style_name'];
        $s_id = $row['id'];
        ?>

        <div id="<?php echo $s_name; ?>">
        <h2 style="margin-top:50px"><?php echo $s_name; ?></h2>
        <hr>
          <div class="row">

          <?php 
          $result1 = $conn->query("SELECT * FROM style INNER JOIN portfolio ON portfolio.pf_style = style.id WHERE portfolio.pf_style=$s_id") or die(mysqli_error($conn)); ;

                while ($row2 = mysqli_fetch_array($result1)) { 
                    $imgsrc = "includes/portfolio/".$row2['pf_image'];
                    $titlesrc = $row2['pf_title'];
                    ?>
                      <div class="col-md-3" style="margin:10px 0 80px 0">
                          <button data-id="<?php echo $row2['id'];?>" class="userinfo" style="background-color: transparent;border:none;outline:none;">
                              <div class="card mb-3 shadow-sm divcenter">
                                      <img class='imgcenter' src='<?php echo $imgsrc;?>' height='100%'/>
                                    <div class="card-body" >
                                      <h3><?php echo $titlesrc; ?></h3>
                                    </div>
                              </div>
                          </button>
                      </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>

        <!-- Modal -->
          <div class="modal modal-body" id="empModal">
            <div class="modal-content">
            </div>
         </div>

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
              url: 'includes/ajax_gallery.php',
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
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</html>
