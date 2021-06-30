<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  {
header('location:index.php');
}
else{
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Enjoy Your Travel with us -Bus Booking System</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

</head>
<body>

<!-- Start Switcher -->
<?php
//include('includes/colorswitcher.php');?>
<!-- /Switcher -->

<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header -->

<!--Page Header-->

<!-- /Page Header-->



<section class="user_profile inner_pages">
  
    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>

      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">Choose my route  </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">


<!-- basic table  Start -->
		<div class="booking-form">
              <form method="POST" action="buses.php">

                <div class="row">
 <div class="col-md-6">
<div class="form-group">
    <label class="control-label">Departure <span>*</span></label>
     <select required name="route" class="form-control white_bg">
      <option value="" selected disabled>--Travel Departure--</option>
   <option>Kisumu</option>
    <option>Nairobi</option>
    <option>Mombasa</option>
    </select>
</div>
  </div>    
    
   <div class="col-md-6">
<div class="form-group">
    <label class="control-label">Destination <span>*</span></label>
     <select required name="route_two" class="form-control white_bg">
      <option value="" selected disabled>--Travel Destination--</option>
   <option>Nairobi</option>
    <option>Kisumu</option>
    <option>Mombasa</option>
    </select>
</div>
  </div> 
<div class="col-md-6">
 <div class="form-group">
              <label class="control-label">Date Of Travel <span>*</span></label>
              <input type="date" name="date" class="form-control white_bg"  required min="<?php echo Date("Y-m-d") ?>">
            </div>
     </div>
<div class="col-md-6">
                 <div class="form-group">
                 <label class="control-label">Click Below to check Route</label>
              <button class="btn" type="submit" name="submit" type="submit">Check Available Bus <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
        </div>
              </form>
            </div>
          </div>

										</div>
					</div>
				</div>



          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/my-vehicles-->
<?php include('includes/footer.php');?>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php 
}
?>