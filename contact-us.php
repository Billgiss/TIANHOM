<!DOCTYPE html>
<html class="no-js" lang="en">

<?php
    session_start();
    include('server.php');
    include('errors.php');

    if(!isset($_SESSION['email'])){
        $_SESSION['msg']="You must log in first";
        header('location: login.php');
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['email']);
        header('location: login.php');
    }
?>
<!-- belle/contact-us.html   11 Nov 2019 12:44:39 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Contact Us &ndash; Tianhom Scent Candle Store</title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/Logo.png" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="assets/css/plugins.css">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body class="contact-template page-template belle">
<div class="pageWrapper">
	<!--Search Form Drawer-->
	<div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="#">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
            </form>
            <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
        </div>
    </div>
    <!--End Search Form Drawer-->
    <!--Top Header-->
    <div class="top-header">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-10 col-sm-8 col-md-5 col-lg-4">
                    <p class="phone-no"><i class="anm anm-phone-s"></i> 091-123-1234</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                	<div class="text-center"><p class="top-header_middle-text">Tianhom Scent Candle Store</p></div>
                </div>
                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                	<span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                    <ul class="customer-links list-inline">
                    <?php if(isset($_SESSION['email'])): ?>
                        <p> Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
                        <br><p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
                    <?php endif?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Top Header-->
    <!--Header-->
    <div class="header-wrap animated d-flex">
    	<div class="container-fluid">        
            <div class="row align-items-center">
            	<!--Desktop Logo-->
                <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                    <a href="index.php">
                    	<img src="assets/images/Logo.png" width="200" height="90" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                    </a>
                </div>
                <!--End Desktop Logo-->
                <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                	<div class="d-block d-lg-none">
                        <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        	<i class="icon anm anm-times-l"></i>
                            <i class="anm anm-bars-r"></i>
                        </button>
                    </div>
                	<!--Desktop Menu-->
                	<nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                        <ul id="siteNav" class="site-nav medium center hidearrow">
                            <li class="lvl1 parent megamenu"><a href="index.php">Home<i class="anm anm-angle-down-l"></i></a>
                        
                            </li>
                            <li class="lvl1 parent megamenu"><a href="shop.php">Shop <i class="anm anm-angle-down-l"></i></a>
                            </li>
                        
                        <li class="lvl1 parent dropdown"><a href="#">Others <i class="anm anm-angle-down-l"></i></a>
                          <ul class="dropdown">
                            <li><a href="customer.php" class="site-nav">My Account</a></li>
                            <li><a href="contact-us.php" class="site-nav">Contact Us</a></li>
                          </ul>
                        </li>
                      </ul>
                    </nav>
                    <!--End Desktop Menu-->
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                	<div class="logo">
                        <a href="index.php">
                            <img src="assets/images/Logo.png" width="160" height="90" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                        </a>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                	
                    </div>
                    
                </div>
        	</div>
        </div>
    </div>
    <!--End Header-->
    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
		<div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
        	<li class="lvl1 parent megamenu"><a href="index.php">Home</a>
          <ul>
            
          </ul>
        </li>
        	<li class="lvl1 parent megamenu"><a href="shop.php">Shop</a>
          <ul>
            
          </ul>
        </li>
        	<li class="lvl1 parent megamenu"><a href="">Others <i class="anm anm-plus-l"></i></a>
          <ul>
          	
            
			
            <li><a href="customer.php" class="site-nav">My Account</a></li>
            <li><a href="contact-us.php" class="site-nav">Contact Us</a></li>
            
              
            </li>
            
            
          </ul>
        </li>
        	
      </ul>
	</div>
	<!--End Mobile Menu-->
    
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Contact Us</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="index.php" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Contact Us</span>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
            	<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">
                <?php if (isset($_SESSION['error'])): ?>
                            <div class="error">
                                <h3>
                                    <?php
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    ?>
                                </h3>
                            </div>
                <?php endif?>	
                	<h2>Got a problem? Contact us!</h2>
                	<div class="formFeilds contact-form form-vertical">
                      <form action="contact-us_db.php" method="post"  id="contact_form" class="contact-form">	
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        	<div class="form-group">
                          	<input type="text" id="ContactFormName" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        	<div class="form-group">
							<input type="email" id="ContactFormEmail" name="email" placeholder="Email">                        	
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          
                          
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        	<div class="form-group">
                            <textarea rows="10" id="ContactFormMessage" name="message" placeholder="Your Message"></textarea>
                            </div>
                        </div>  
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn" value="Send Message" name="sm">
                        </div>
                     </div>
                     </form>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                	<div class="open-hours">
                    	
                    </div>
                	<hr />
                    <ul class="addressFooter">
                        
                        <li class="phone"><i class="icon anm anm-phone-s"></i><p>091-123-1234</p></li>
                        <li class="email"><i class="icon anm anm-envelope-l"></i><p>Tian@mail.com</p></li>
                    </ul>
                    <hr />
                   
                </div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
    <!--Footer-->
     <!--Footer-->
    <footer id="footer">
        <div class="newsletter-section">
            <div class="container">
                <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
                            <div class="display-table">
                                <div class="display-table-cell footer-newsletter">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex justify-content-end align-items-center">
                            
                        </div>
                    </div>
            </div>    
        </div>
        <div class="site-footer">
        	<div class="container">
     			<!--Footer Links-->
            	<div class="footer-top">
                	<div class="row">
                    	<div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        	<h4 class="h4">Quick Shop</h4>
                            <ul>
                                <li><a href="shop.php?category=1">Category 1</a></li>
                                <li><a href="shop.php?category=2">Category 2</a></li>
                                <li><a href="shop.php?category=3">Category 3</a></li>
                                <li><a href="shop.php?category=4">Category 4</a></li>
                                <li><a href="shop.php?category=5">Category 5</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        	<h4 class="h4">Informations</h4>
                            <ul>
                            	
                                <li><a href="customer.php">My Account</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 footer-links">
                        	<h4 class="h4">Customer Services</h4>
                            <ul>
                            	
                                <li><a href="contact-us.php">Contact Us</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 contact-box">
                        	<h4 class="h4">Contact Us</h4>
                            <ul class="addressFooter">
                                <li class="phone"><i class="icon anm anm-phone-s"></i><p>091-123-1234</p></li>
                                <li class="email"><i class="icon anm anm-envelope-l"></i><p>Tian@mail.com</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Footer Links-->
                <hr>
                <div class="footer-bottom">
                	<div class="row">
                    	
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Footer-->
    
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    
    
    
     <!-- Including Jquery -->
     <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/plugins.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/lazysizes.js"></script>
     <script src="assets/js/main.js"></script>
</div>
</body>

<!-- belle/shop-grid-4.html   11 Nov 2019 12:39:07 GMT -->
</html>