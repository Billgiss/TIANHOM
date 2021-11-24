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
    $query3 = "SELECT cart_id FROM cart WHERE customer_id='$cus_id' ";
    $result3 = $mysqli->query($query3);
    
    while($row=$result3->fetch_array()){
        $cart_id = $row['cart_id'];
        }
    if(isset($cart_id)){
    $query4 = "SELECT product.img as img, product.product_name as pname, cart_details.quantity as quantity, cart_details.total_price as tp from cart_details inner join product WHERE cart_details.cart_id='$cart_id' and cart_details.product_id = product.product_id; ";
    $result4 = $mysqli->query($query4);
    $query5 = "SELECT price from cart WHERE cart_id = '$cart_id'";
    $result5 = $mysqli->query($query5);
    $query8 = "SELECT count(quantity) as countq from cart_details inner join product WHERE cart_details.cart_id='$cart_id' and cart_details.product_id = product.product_id";
    $result8 = $mysqli->query($query8);
    }
    
    
    
    
?>
<!-- belle/shop-grid-4.html   11 Nov 2019 12:39:07 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Shop &ndash; Tianhom Scent Candle Store</title>
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
<body class="template-collection belle">
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
                <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                	<div class="site-cart">
                    	<a href="#;" class="site-header__cart" title="Cart">
                        	<i class="icon anm anm-bag-l"></i>
                            <?php
                            if(!empty($result8)){ 
                            while($row=$result8->fetch_array()){?>
                            <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count"><?php echo $row['countq']?></span>
                            <?php }}?>
                        </a>
                        <!--Minicart Popup-->
                        <?php if (isset($cart_id)) {?>
                        <div id="header-cart" class="block block-cart">
                        	<ul class="mini-products-list">
                                <?php if(!empty($result4)){
                                    while($row=$result4->fetch_array()){
                                        
                                ?>
                                <li class="item">
                                	<a class="product-image" href="#">
                                    	<img src="<?php echo $row["img"] ?>" />
                                    </a>
                                    <div class="product-details">
                                    	<a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                        <a href="cart.php" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                                        <a class="pName" href=""><?php echo $row["pname"] ?></a>
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                            	<span class="label">Qty:</span>
                                                <span class="label"><?php echo $row['quantity']?></span>
                                            </div>
                                        </div>
                                        <div class="priceRow">
                                        	<div class="product-price">
                                            	<span class="money">Price: <?php echo $row['tp']?></span>
                                            </div>
                                         </div>
									</div>
                                </li>
                                <?php }
                                }?>
                            </ul>
                            <div class="total">
                            	<div class="total-in">
                                <?php
                                if(!empty($result5)){
                                    while($row=$result5->fetch_array()){
                                        
                                ?>
                                	<span class="label">Cart Subtotal:</span><span class="product-price"><span class="money"><?php echo $row['price'] ?> THB</span></span>
                                <?php
                                    }
                                }
                                ?>
                                </div>
                                 <div class="buttonSet text-center">
                                    <a href="cart.php" class="btn btn-secondary btn--small">View Cart</a>
                                    <a href="checkout.php" class="btn btn-secondary btn--small">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!--End Minicart Popup-->
                    </div>
                   
                </div>
        	</div>
        </div>
    </div>
    <!--End Header-->
    
    <!--Body Content-->
    <div id="page-content">
    	<!--Collection Banner-->
    	<div class="collection-header">
			<div class="collection-hero">
        		<div class="collection-hero__image"><img class="blur-up lazyload" data-src="assets/images/Product_back.jpeg" src="assets/images/Product_back.jpg" alt="Product_back" title="Product_back" /></div>
        		<div class="collection-hero__title-wrapper"><h1 class="collection-hero__title page-width">Products</h1></div>
      		</div>
		</div>
        <!--End Collection Banner-->
        
        <div class="container">
        	<div class="row">
            	<!--Sidebar-->
            	<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                	<div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                	<div class="sidebar_tags">
                    	<!--Categories-->
                    	<div class="sidebar_widget categories filter-widget">
                            <div class="widget-title"><h2>Categories</h2></div>
                            <div class="widget-content">
                                <ul class="sidebar_categories">
                                    <li class="lvl-1"><a href="shop.php?category=1" class="site-nav">Category 1</a></li>
                                    <li class="lvl-1"><a href="shop.php?category=2" class="site-nav">Category 2</a></li>
                                    <li class="lvl-1"><a href="shop.php?category=3" class="site-nav">Category 3</a></li>
                                    <li class="lvl-1"><a href="shop.php?category=4" class="site-nav">Category 4</a></li>
                                    <li class="lvl-1"><a href="shop.php?category=5" class="site-nav">Category 5</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--Banner-->
                        <div class="sidebar_widget static-banner">
                        	<img src="" alt="" />
                        </div>
                        <!--Banner-->
                        
                        
                    </div>
                </div>
                <!--End Sidebar-->
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                	<div class="productList">
                    	<!--Toolbar-->
                        <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                    	<div class="toolbar">
                        	<div class="filters-toolbar-wrapper">
                            	<div class="row">
                                	<div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                    	
                                    </div>
                                    <?php
                                     if(mysqli_num_rows($result2) > 0){
                                        while($row=$result2->fetch_array()){
                                    ?>

                                    <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    	<span class="filters-toolbar__product-count"><?php echo "Showing: ".$row['num']?></span>
                                    </div>

                                    <?php
                                        }
                                    }

                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                        <!--End Toolbar-->
                        <div class="ps-product-box five-column">
        <div class="row">
        
        
        <?php
        
        if(mysqli_num_rows($result) > 0){
            while($row=$result->fetch_array()){
        ?>
          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
          <div class="ps-product">
            
                  <div class="ps-product__thumbnail"><img src=<?php echo $row["img"] ?> height="150" alt=""/><a class="ps-product__overlay" href="#"></a>
                  </div>
                  <div class="ps-product__content">
                    <div class="ps-product__desc"><a class="ps-product__title" href="#"><?php echo $row["product_name"] ?></a>
                    <br>
                    <span class="ps-product__price"><?php echo $row['price']?> THB</span>
                    </div>
                    <div class="ps-product__shopping"><a href ='cart_db.php?productid=<?php echo $row['product_id']?>'><input type = "submit" name = "addt" class="ps-btn ps-product__add-to-cart" value = "Add to cart"></a>

                    </div>
                </div>
            </div>
             </div>
             <?php
    }
}

?>            
              </div>
              </div>
    <!--End Body Content-->
    
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