<?php 
		session_start();

    include 'includes/db.inc.php';

?>
<style>
      .nav-item a:hover{
        color:#007bff;
      }

.dropdown-content {
  display: none;
  float:right;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 250px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

.dropdown-item:hover{
  background-color:inherit;
}
</style>

<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #4899A4">
	  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><img src="assets/icons/logo3.png" height="35px" style="display: block;margin-left: auto; margin-right: auto;"></a>
	  <ul class="navbar-nav px-3" >
	  	<li class="nav-item text-nowrap" style="position:absolute;margin-left:-40px;margin-top:7px;float:right" > 
	      <img src="assets/icons/bell.png" height="20px" onclick="myFunction()" class="dropbtn">
  		    <div id="myDropdown" class="dropdown-content" style="right:0">
            <p style="font-weight:bold;margin:5px 13px -10px;color:#3E7DEB;">Merch Orders</p><hr>
            <?php 
              $merresults = mysqli_query($conn, "SELECT * FROM orders_merch WHERE status = 'Pending' ORDER BY order_date ASC "); 

              while ($row = mysqli_fetch_array($merresults)) { ?>
              <a class="dropdown-item" type="button" style="margin-top:-20px" href="orders.php?details=<?php echo $row['id']; ?>">Merch Order #<?php echo $row['id']; ?></a>
              <h6 class="dropdown-header" style="font-size:13px;margin-top:-20px;margin-bottom:-15px"><?php echo $row['order_date']; ?></h6><hr>
            <?php } ?>
            <p style="font-weight:bold;margin:-10px 13px;color:#3E7DEB;">Commission Requests</p><hr>
            <?php 
              $comresults = mysqli_query($conn, "SELECT * FROM orders_commission WHERE status = 'Pending' ORDER BY order_date DESC "); 

              while ($row = mysqli_fetch_array($comresults)) { ?>
              <a class="dropdown-item" type="button" style="margin-top:-20px" href="orders_commission.php?details=<?php echo $row['id']; ?>">Commission Request #<?php echo $row['id']; ?></a>
              <h6 class="dropdown-header" style="font-size:13px;margin-top:-20px;margin-bottom:-15px"><?php echo $row['order_date']; ?></h6><hr>
            <?php } ?>
          </div>
		  </div>
		</li>

	    <li class="nav-item text-nowrap" style="margin-right:15px">
	      <a class="nav-link" href="login.php?logout">Log out</a>
	    </li>
	  </ul>
	</header>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>