  <!DOCTYPE html>
<html>
<title>OCCC Visitation Scheduling</title>
<?php date_default_timezone_set( 'HST'); ?>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-navbar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<ul class="w3-navbar w3-black w3-card-2 w3-top w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-black" href="javascript:void(0);" onclick="navDem()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
  </li>
  <li class=""><a href="\" class="w3-padding-large w3-white">Today</a></li>
  <li class="w3-hide-small"><a href="search" class="w3-padding-large w3-hover-white">Search</a></li>
  <li class="w3-hide-small"><a href="support" class="w3-padding-large w3-hover-white">Support</a></li>
</ul>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-black">
    <li><a class="w3-padding-large" href="\">Search</a></li>
    <li><a class="w3-padding-large" href="\">Support</a></li>
  </ul>
</div>

<!-- Header -->
<div class="w3-container w3-white w3-center w3-padding-64">
  <?php echo "<h3 class=\"w3-margin w3-left w3-largeX\">Pending Visit Requests as of " . date("Y/m/d") . " " . date("h:i a") . "</h3>"; ?>
  <!--

  <a onclick="collapseAll()" class="w3-right w3-btn-floating-large w3-red"><i class="fa fa-minus"></i></a>


  <a onclick="expandAll()" class="w3-right w3-btn-floating-large w3-red"><i class="fa fa-plus"></i>

  </a>
  -->
<?php
    
    //session_start();
    
    include ("checkalone.php");


   

    

?>





</div>




<script>
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-hide") == -1) {
        x.className += "w3-hide";
    } else {
        x.className = x.className.replace("w3-hide", "");
    }
  }
</script>

<script>
function newFunction(id){
  var x = document.getElementById(id);

    if (x.className.indexOf("w3-hide") == -1) {
        x.className += " w3-hide";
    } else {
        x.className = x.className.replace("w3-hide", " ");
    }
  }

</script>
  

</body>
</html>
