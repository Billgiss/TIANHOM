<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
    session_start();
    include('server.php');
    include('errors.php');
    $cus_id=$_SESSION['cus_id'];
    if(!isset($_SESSION['email'])){
        $_SESSION['msg']="You must log in first";
        header('location: login.php');
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['email']);
        header('location: login.php');
    }
    if(isset($_GET['category'])){
        $c_id=$_GET['category'];
        $query = "SELECT product_name, price, stock, img FROM product WHERE CategoryID=$c_id";
        $query2 = "SELECT count(product_name) as num FROM product WHERE CategoryID=$c_id";
        $result = $mysqli->query($query);
        $result2 = $mysqli->query($query2);
    }
    else { 
        $query = "SELECT product_id, product_name, price, stock, img FROM product";
        $result = $mysqli->query($query);
        $query2 = "SELECT count(product_name) as num FROM product";
        $result2 = $mysqli->query($query2);
    }
    
    
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Tianhom Scent Candle Store</title>
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
<body class="template-index home13-auto-parts">
<div id="pre-loader">
    <img src="assets/images/loader.gif" alt="Loading..." />
</div>
<div class="pageWrapper">
	<!--Search Form Drawer-->
	
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
    <div class="header-wrap animated d-flex border-bottom">
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
                <!--Mobile Logo-->
                <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                	<div class="logo">
                        <a href="index.php">
                            <img src="assets/images/Logo.png" width="160" height="90" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                        </a>
                    </div>
                </div>
                <!--Mobile Logo-->
                
                    </div>
                    
                </div>
        	</div>
        </div>
    </div>
    <!--End Header-->
    
    <!--Store Feature Top-->
    <div class="store-feature-top">
    	<div class="container">
        	<div class="row">
            	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                	<div class="flex top-info-bar">
                    	<div class="flex-item">
                			<img src="assets/images/truck-mini.png" alt=""> Free Shipping for all orders.
            			</div>
                        <div class="flex-item">
                			<img src="assets/images/check.png" alt=""> Thailand Delivery.
            			</div>
                        <div class="flex-item">
                			<img src="assets/images/return-mini.png" alt=""> No Refunds.
            			</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Store Feature Top-->
    
    
    
    <!--Body Content-->
    <div id="page-content">
    	<!--Home slider-->
    	<div class="slideshow slideshow-wrapper pb-section">
        	<div class="home-slideshow">
            	<div class="slide">
                	<div class="blur-up lazyload">
                        <img class="blur-up lazyload desktop-show" data-src="assets/images/background.jpg" src="assets/images/background.jpg" alt="The Perfect Theme for Your Auto Parts Business" title="The Perfect Theme for Your Auto Parts Business" />
                        <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                            <div class="slideshow__text-content bottom">
                            	<div class="container">
                                    <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">Welcome to Tianhom Scent Candle Store</h2>
                                        <span class="mega-subtitle slideshow__subtitle">Stay safe! Get your groceries here!</span>
                                        <span class="btn"><a href="shop.php">Purchase now!</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Home slider-->
        
        <!--Our benefits will change the way you buy parts-->
        <div class="section featured-content pb-0">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    	<div class="section-header text-center">
                            <h2 class="h2">Ordering groceries online will never be the same</h2>
                            <p>Order with confidence!</p>
                        </div>
                    </div>
                </div>
                <div class="row list-items">
                	<div class="col-12 col-sm-6 col-md-4 col-lg-4 text-center">
                    	<img class="blur-up lazyload" data-src="assets/images/warranty.png" src="assets/images/warranty.png" alt="Warranty" title="Warranty" />
                        <h3 class="h4">Warranty</h3>
                        <p>All products are all high quality grade.</p>
                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 text-center">
                    	<img class="blur-up lazyload" data-src="assets/images/dollar.png" src="assets/images/dollar.png" alt="Competitive Prices" title="Competitive Prices" />
                        <h3 class="h4">Competitive Prices</h3>
                        <p>We assure you that all prices are the cheapest among other stores.</p>
                    </div>
                    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 text-center">
                    	<img class="blur-up lazyload" data-src="assets/images/truck.png" src="assets/images/truck.png" alt="Fast Delivery" title="Fast Delivery" />
                        <h3 class="h4">Fast Delivery</h3>
                        <p>We assure you that all deliveries will be sent as soon as possible.</p>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--End Our benefits will change the way you buy parts-->
        
        <!--Collection Box slider-->
        <div class="collection-box fadeIn section">
        	<div class="container-fluid">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    	<div class="section-header text-center">
                            <h2 class="h2">What are you looking for?</h2>
                            <p>Solutions for a better shopping experience</p>
                        </div>
                    </div>
                </div>
				<div class="collection-grid-4item">
                    <div class="collection-grid-item">
                        <a href="shop.php?category=1" class="collection-grid-item__link">
                            <img data-src="assets/images/p1.WEBP" src="assets/images/p1.WEBP" alt="Shoes" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Category 1</h3>
                            </div>
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="shop.php?category=2" class="collection-grid-item__link">
                            <img data-src="assets/images/p2.WEBP" src="assets/images/p2.WEBP" alt="Body Parts" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Category 2</h3>
                            </div>
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="shop.php?category=3" class="collection-grid-item__link">
                            <img data-src="assets/images/p3.WEBP" src="assets/images/p3.WEBP" alt="Accessories" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Category 3</h3>
                            </div>
                        </a>
                    </div>
                    <div class="collection-grid-item blur-up lazyloaded">
                        <a href="shop.php?category=4" class="collection-grid-item__link">
                            <img data-src="assets/images/p4.WEBP" src="assets/images/p4.WEBP" alt="Tools &amp; Equipment" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Category 4</h3>
                            </div>
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="shop.php?category=5" class="collection-grid-item__link">
                            <img data-src="assets/images/p5.WEBP" src="assets/images/p5.WEBP" alt="Tools" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Category 5</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--End Collection Box slider-->
        
        
        
        <!--Parallax Section-->
        <div class="section">
            <div class="hero hero--large hero__overlay bg-size">
            	<img class="bg-img blur-up" src="assets/images/background2.JPG" alt="" />
                <div class="hero__inner">
                    <div class="container">
                        <div class="wrap-text  center text-small font-regular">       
          					<h2 class="h2 mega-title">Outstanding selection, service and delivery to our customers is our top priority</h2>
          					<div class="rte-setting mega-subtitle"></div>
          					<a href="contact-us.php" class="btn">Contact Us Now</a>
      					</div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Parallax Section-->
        
        
        
        
        
    </div>
    <!--End Body Content-->
    
    <!--Footer-->
    <footer id="footer" class="footer-2">
        <div class="newsletter-section">
            <div class="container">
                <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 w-100 d-flex justify-content-start align-items-center">
                            <div class="display-table">
                                <div class="display-table-cell footer-newsletter">
                                    <div class="section-header text-center">
                                        
                                    </div>
                                    
                            </div>
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
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/jquery.cookie.js"></script>
     <script src="assets/js/vendor/wow.min.js"></script>
     <!-- Including Javascript -->
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/plugins.js"></script>
     <script src="assets/js/popper.min.js"></script>
     <script src="assets/js/lazysizes.js"></script>
     <script src="assets/js/main.js"></script>
     <!--For Newsletter Popup-->
     <script>
		jQuery(document).ready(function(){  
		  jQuery('.closepopup').on('click', function () {
			  jQuery('#popup-container').fadeOut();
			  jQuery('#modalOverly').fadeOut();
		  });
		  
		  var visits = jQuery.cookie('visits') || 0;
		  visits++;
		  jQuery.cookie('visits', visits, { expires: 1, path: '/' });
		  console.debug(jQuery.cookie('visits')); 
		  if ( jQuery.cookie('visits') > 1 ) {
			jQuery('#modalOverly').hide();
			jQuery('#popup-container').hide();
		  } else {
			  var pageHeight = jQuery(document).height();
			  jQuery('<div id="modalOverly"></div>').insertBefore('body');
			  jQuery('#modalOverly').css("height", pageHeight);
			  jQuery('#popup-container').show();
		  }
		  if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
		}); 
		
		jQuery(document).mouseup(function(e){
		  var container = jQuery('#popup-container');
		  if( !container.is(e.target)&& container.has(e.target).length === 0)
		  {
			container.fadeOut();
			jQuery('#modalOverly').fadeIn(200);
			jQuery('#modalOverly').hide();
		  }
		});
		
		/*--------------------------------------
			Promotion / Notification Cookie Bar 
		  -------------------------------------- */
		  if(Cookies.get('promotion') != 'true') {   
			 $(".notification-bar").show();         
		  }
		  $(".close-announcement").on('click',function() {
			$(".notification-bar").slideUp();  
			Cookies.set('promotion', 'true', { expires: 1});  
			return false;
		  });
	</script>
    <!--End For Newsletter Popup-->
</div>
</body>

<!-- belle/home13-auto-parts.html   11 Nov 2019 12:35:17 GMT -->
</html>