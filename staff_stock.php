<?php 
session_start();
include('server.php');
include('errors.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Account &ndash; Tianhom Scent Candle Store</title>
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
<body class="page-template belle">
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
                	<div class="text-center"><p class="top-header_middle-text"> Tianhom Scent Candle Store</p></div>
                </div>
                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                	<span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                    <ul class="customer-links list-inline">
                        <li><a href="staff_login.php">Log out</a></li>
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
                    <a href="staff.php">
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
                        <li class="lvl1 parent megamenu"><a href="staff.php">Account</a>
                        </li>
                        <li class="lvl1 parent megamenu"><a href="staff_message.php">Messages</a>
                        </li>
        	            <li class="lvl1 parent megamenu"><a href="staff_stock.php">Stock</a>
                        </li>
                        <li class="lvl1 parent megamenu"><a href="staff_paymentstatus.php">Payment Status</a>
                        </li>
                      </ul>
                    </nav>
                    <!--End Desktop Menu-->
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                	<div class="logo">
                        <a href="staff.php">
                            <img src="assets/images/Logo.png" width="160" height="90" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                        </a>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                	<div class="site-cart">
                    	<a href="#;" class="site-header__cart" title="Cart">
                        	
                           
                        </a>
                        
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
        <li class="lvl1 parent megamenu"><a href="staff.php">Account</a>
        </li>
        	<li class="lvl1 parent megamenu"><a href="staff_message">Messages</a>
        </li>
        	<li class="lvl1 parent megamenu"><a href="staff_stock">Stock</a>
        </li>
        	
      </ul>
	</div>
	<!--End Mobile Menu-->
    
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Stocks</h1>
                <table>
                <col width="15%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="5%">
                <col width="5%">

                <tr> 
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Edit</th>
                    
                    <br>
                    <br>
                    <br>

                </tr> 
                    <?php
                    $query = "SELECT product_id, product_name, price, stock, img FROM product";
                    $result = $mysqli->query($query);
                    
                    if ($result){
                        while($row=$result->fetch_array()){
                            echo "<tr>";
                            echo "<td>" . $row["product_name"] . "</td>";
                            echo "<td>" . $row["price"]."</td>"; 
                            echo "<td>" . $row["stock"]."</td>"; 
            
                            echo '<td><a href="edit_stock.php?product_id='.$row['product_id'].'">';
                            echo '<img src="assets/images/Modify.png" width="24" height="24">';
                            echo '</a></td>';
                            echo "</tr>";
                  }
                } else {
                  echo "Error:" . $mysqli->error;
                }
            
                ?>
            </table>
            </div>

      		</div>
		</div>
            </div>

        <!--End Page Title-->
        
        
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
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                
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