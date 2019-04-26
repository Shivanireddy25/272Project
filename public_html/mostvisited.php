<?php

//array to store sites visited
 

$myservices = [];
$serviceurl = [];  
$i = 0;

 arsort($_COOKIE); 
 foreach (array_slice($_COOKIE,0,7) as $key => $value) { 
    //read cookie value
    
        if (($key=='service1') ) {
              array_push($myservices,"All Inclusive Packages");
              array_push($serviceurl,"checkpage.php"); 
              }
        if (($key=='service2') ) {
              array_push($myservices,"Custom Packages");
              array_push($serviceurl,"custom.php");
              }
        if (($key=='service3') ) {
              array_push($myservices,"Group Packages"); 
              array_push($serviceurl,"group.php"); 
        }
        if (($key=='service4') ) {
             array_push($myservices,"Camping Packages"); 
              array_push($serviceurl,"camp.php"); 
        }
        if (($key=='service5') ) {
              array_push($myservices,"Trekking Packages"); 
              array_push($serviceurl,"trek.php");     
        }
        if (($key=='service6') ) {
              array_push($myservices,"HoneyMoon Packages"); 
              array_push($serviceurl,"honeymoon.php"); 
        }
        if (($key=='service7') ) {
              array_push($myservices,"Single Day Picnic Packages"); 
              array_push($serviceurl,"singleday.php");  
        }
        if (($key=='service8') ) {
            array_push($myservices,"Sky Diving Packages"); 
            array_push($serviceurl,"skydive.php");  
            
        }
        if (($key=='service9') ) {
            array_push($myservices,"Resort and Stay Packages"); 
            array_push($serviceurl,"resort.php");  
        }
        if (($key=='service10')) {
            array_push($myservices,"Transportation");
            array_push($serviceurl,"transport.php");  
        }
   }
  
   
    
       ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Adventure Tours</title>
  <!--meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="peek Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
  />
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);


    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!--booststrap-->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <!--//booststrap end-->
  <!-- font-awesome icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!--stylesheets-->
  <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
  <!--//stylesheets-->
<link href="//fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
</head>

<body>
  <!-- //banner -->
     <div class="banner-left-side" id="home">
      <!-- header -->
      <div class="headder-top d-sm-flex justify-content-sm-between">
        <!-- nav -->
        <nav class="text-center">
          <label for="drop" class="toggle">Menu</label>
          <input type="checkbox" id="drop">
          <ul class="menu mt-2">
            <li class="active"><a href="index.html">Home</a></li>
          </ul>

        </nav>
		<div class="social-icons text-sm-right pt-2">
        <ul>
          <li class="facebook">
            <a href="#">
              <span class="fa fa-facebook"></span>
            </a>
          </li>
          <li class="twitter">
            <a href="#">
              <span class="fa fa-twitter"></span>
            </a>
          </li>
          <li class="rss mr-lg-3">
            <a href="#">
              <span class="fa fa-rss"></span>
            </a>
          </li>
        </ul>
      </div>
        <!-- //nav -->
	  </div>
      <!-- //header -->
      <!-- banner -->
   <br>
   <br>
<div class="row">

<div class="col-lg-7 col-md-6 service-left-grid">
<h5>Most Five visited services</h5>
</div>
<div class="col-lg-5 col-md-6 service-left-matter">
<div class="row my-lg-4 my-3">
                <div class="col-lg-2 col-md-2 col-sm-3 feature-icons p-0">
                  <span class="fa fa-arrow-right visitedServicetext-center" aria-hidden="true"></span>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-9 features-left px-0 pt-1">
                   
                  <?php if (isset($serviceurl[0])) { echo "<h4><a href=$serviceurl[0]>  $myservices[0] </a></h4>" ;} ?>
                </div>
			 
              </div>
<div class="row my-lg-4 my-3">
                <div class="col-lg-2 col-md-2 col-sm-3 feature-icons p-0">
                  <span class="fa fa-arrow-right text-center" aria-hidden="true"></span>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-9 features-left px-0 pt-1">
                  <?php if (isset($serviceurl[1])) { echo "<h4><a href=$serviceurl[1]>  $myservices[1] </a></h4>" ; }?>
                </div>
              </div>
<div class="row my-lg-4 my-3">
                <div class="col-lg-2 col-md-2 col-sm-3 feature-icons p-0">
                  <span class="fa fa-arrow-right text-center" aria-hidden="true"></span>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-9 features-left px-0 pt-1">
                 <?php if (isset($serviceurl[2])) { echo "<h4><a href=$serviceurl[2]>  $myservices[2] </a></h4>" ;} ?>
                </div>
                </div>
<div class="row my-lg-4 my-3">
                <div class="col-lg-2 col-md-2 col-sm-3 feature-icons p-0">
                  <span class="fa fa-arrow-right text-center" aria-hidden="true"></span>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-9 features-left px-0 pt-1">
                  <?php if (isset($serviceurl[3])) {echo "<h4><a href=$serviceurl[3]>  $myservices[3] </a></h4>" ;} ?>
                </div>
                </div>
<div class="row my-lg-4 my-3">
                <div class="col-lg-2 col-md-2 col-sm-3 feature-icons p-0">
                  <span class="fa fa-arrow-right text-center" aria-hidden="true"></span>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-9 features-left px-0 pt-1">
                 <?php if (isset($serviceurl[4])) {echo "<h4><a href=$serviceurl[4]>  $myservices[4] </a></h4>" ;} ?>
                 
                </div>
                </div>

</div>
</div>
</section>
