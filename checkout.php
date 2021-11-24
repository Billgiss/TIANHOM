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
    if(mysqli_num_rows($result3)==0){
        header('location: shop.php');
    }
    else{
    while($row=$result3->fetch_array()){
        $cart_id = $row['cart_id'];
        }
    
    $query4 = "SELECT product.img as img, product.price as price, product.product_name as pname, cart_details.quantity as quantity, cart_details.total_price as tp from cart_details inner join product WHERE cart_details.cart_id='$cart_id' and cart_details.product_id = product.product_id ";
    $result4 = $mysqli->query($query4);
    $query5 = "SELECT price from cart WHERE cart_id = '$cart_id'";
    $result5 = $mysqli->query($query5);
    $query6 = "SELECT product.product_id as id, product.img as img, product.price as price, product.product_name as pname, cart_details.quantity as quantity, cart_details.total_price as tp from cart_details inner join product WHERE cart_details.cart_id='$cart_id' and cart_details.product_id = product.product_id";
    $result6 = $mysqli->query($query6);
    $query7 = "SELECT price from cart WHERE cart_id = '$cart_id'";
    $result7 = $mysqli->query($query7);
    $query8="SELECT * from customer WHERE customer_id='$cus_id'";
    $result8=$mysqli->query($query8);
    $query9 = "SELECT product.img as img, product.price as price, product.product_name as pname, cart_details.quantity as quantity, cart_details.total_price as tp from cart_details inner join product WHERE cart_details.cart_id='$cart_id' and cart_details.product_id = product.product_id ";
    $result9 = $mysqli->query($query9);
    $query10 = "SELECT price from cart WHERE cart_id = '$cart_id'";
    $result10 = $mysqli->query($query10);
    $query11 = "SELECT count(quantity) as countq from cart_details inner join product WHERE cart_details.cart_id='$cart_id' and cart_details.product_id = product.product_id";
    $result11 = $mysqli->query($query11);

    }

?>
<!-- belle/checkout.html   11 Nov 2019 12:44:33 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Checkout &ndash; Tianhom Scent Candle Store</title>
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
                <div class="site-cart">
                    	<a href="#" class="site-header__cart" title="Cart">
                        	<i class="icon anm anm-bag-l"></i>
                            <?php if(!empty($result11)){
                            while($row=$result11->fetch_array()){?>
                            <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count"><?php echo $row['countq']?></span>
                            <?php }}?>
                        </a>
                        <!--Minicart Popup-->
                        <div id="header-cart" class="block block-cart">
                        	<ul class="mini-products-list">
                                <?php
                                    
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
                                    
                                ?>
                            </ul>
                            <div class="total">
                            	<div class="total-in">
                                <?php
                                    
                                    while($row=$result5->fetch_array()){
                                        
                                ?>
                                	<span class="label">Cart Subtotal:</span><span class="product-price"><span class="money"><?php echo $row['price'] ?> THB</span></span>
                                <?php
                                    }
                                
                                
                                ?>
                                </div>
                                 <div class="buttonSet text-center">
                                    <a href="cart.php" class="btn btn-secondary btn--small">View Cart</a>
                                    <a href="checkout.php" class="btn btn-secondary btn--small">Checkout</a>
                                </div>
                            </div>
                        </div>
                        <!--End Minicart Popup-->
                    </div>
                    <div class="site-header__search">
                    	
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
        	<li class="lvl1 parent megamenu"><a href="#">Others <i class="anm anm-plus-l"></i></a>
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
        		<div class="wrapper"><h1 class="page-width">Checkout</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="customer-box returning-customer">
                        
                        
                    </div>
                </div>
            </div>

            <div class="row billing-fields">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                        <form>
                            <fieldset>
                                <h2 class="login-title mb-3">Billing details</h2>
                                <?php while($row=$result8->fetch_array()){?>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-firstname">Name </label>
                                        <br>
                                        <label for="input-email"><?php echo $row['name']?></label>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-email">E-Mail</label>
                                        <br>
                                        <label for="input-email"><?php echo $row['email']?></label>
                                    </div>
                                    
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="input-email">Address</label>
                                        <br>
                                        <label for="input-email"><?php echo $row['address']?></label>
                                    </div>
                                </div>
                            </fieldset>
                            <?php }?>
                            <fieldset>
                                <div class="row">
                                    <div class="form-group form-check col-md-12 col-lg-12 col-xl-12">
                                        <label class="form-check-label padding-15px-left">
                                            
                                        </label>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Your Order</h2>

                            <div class="table-responsive-sm order-table"> 
                                <table class="bg-white table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Product Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                        <?php while($row=$result9->fetch_array()){?>
                                    <td class="text-left"><?php echo $row['pname']?></td>
                                            <td><?php echo $row['price']?></td>
                                            <td><?php echo $row['quantity']?></td>
                                            <td><?php echo $row['tp']?></td>
                                    </tbody>
                                    </tr>
                        <?php }?>
                                    <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="4" class="text-right">Shipping </td>
                                            <td>FREE!</td>
                                        </tr>
                                        <tr>
                                        <?php while($row=$result10->fetch_array()){?>
                                            <td colspan="4" class="text-right">Total</td>
                                            <td><?php echo $row['price']?></td>
                                        <?php }?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        
                        <hr />

                        <div class="your-payment">
                            <h2 class="payment-title mb-3">payment method</h2>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion" class="payment-section">
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#collapseOne">Direct Bank Transfer </a>
                                            </div>
                                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">css325 Bank 123-456-7890</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        

                                <div class="order-button-payment">
                                <button><a href="addorder.php" class="btn" value="Place order" type="submit">Place order</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
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
                            	
                                <li><a href="#">My Account</a></li>
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
    
    <!--Quick View popup-->
    <div class="modal fade quick-view-popup" id="content_quickview">
    	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="modal-body">
                    <div id="ProductSection-product-template" class="product-template__container prstyle1">
                <div class="product-single">
                <!-- Start model close -->
                <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right" title="close"><span class="icon icon anm anm-times-l"></span></a>
                <!-- End model close -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="pl-20">
                                <img src="assets/images/product-detail-page/camelia-reversible-big1.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product-single__meta">
                                <h2 class="product-single__title">Product Quick View Popup</h2>
                                <div class="prInfoRow">
                                    <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                                    <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                </div>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    <s id="ComparePrice-product-template"><span class="money">$600.00</span></s>
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money">$500.00</span></span>
                                    </span>
                                </p>
                                <div class="product-single__description rte">
                                    Belle Multipurpose Bootstrap 4 Html Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion,...
                                </div>
                                
                            <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                                <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                    <div class="product-form__item">
                                      <label class="header">Color: <span class="slVariant">Red</span></label>
                                      <div data-value="Red" class="swatch-element color red available">
                                        <input class="swatchInput" id="swatch-0-red" type="radio" name="option-0" value="Red">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-red" style="background-image:url(assets/images/product-detail-page/variant1-1.jpg);" title="Red"></label>
                                      </div>
                                      <div data-value="Blue" class="swatch-element color blue available">
                                        <input class="swatchInput" id="swatch-0-blue" type="radio" name="option-0" value="Blue">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-blue" style="background-image:url(assets/images/product-detail-page/variant1-2.jpg);" title="Blue"></label>
                                      </div>
                                      <div data-value="Green" class="swatch-element color green available">
                                        <input class="swatchInput" id="swatch-0-green" type="radio" name="option-0" value="Green">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-green" style="background-image:url(assets/images/product-detail-page/variant1-3.jpg);" title="Green"></label>
                                      </div>
                                      <div data-value="Gray" class="swatch-element color gray available">
                                        <input class="swatchInput" id="swatch-0-gray" type="radio" name="option-0" value="Gray">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-gray" style="background-image:url(assets/images/product-detail-page/variant1-4.jpg);" title="Gray"></label>
                                      </div>
                                    </div>
                                </div>
                                <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                    <div class="product-form__item">
                                      <label class="header">Size: <span class="slVariant">XS</span></label>
                                      <div data-value="XS" class="swatch-element xs available">
                                        <input class="swatchInput" id="swatch-1-xs" type="radio" name="option-1" value="XS">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-xs" title="XS">XS</label>
                                      </div>
                                      <div data-value="S" class="swatch-element s available">
                                        <input class="swatchInput" id="swatch-1-s" type="radio" name="option-1" value="S">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-s" title="S">S</label>
                                      </div>
                                      <div data-value="M" class="swatch-element m available">
                                        <input class="swatchInput" id="swatch-1-m" type="radio" name="option-1" value="M">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-m" title="M">M</label>
                                      </div>
                                      <div data-value="L" class="swatch-element l available">
                                        <input class="swatchInput" id="swatch-1-l" type="radio" name="option-1" value="L">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-l" title="L">L</label>
                                      </div>
                                    </div>
                                </div>
                                <!-- Product Action -->
                                <div class="product-action clearfix">
                                    <div class="product-form__item--quantity">
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="product-form__item--submit">
                                        <button type="button" name="add" class="btn product-form__cart-submit">
                                            <span>Add to cart</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Product Action -->
                            </form>
                            <div class="display-table shareRow">
                                    <div class="display-table-cell">
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
                <!--End-product-single-->
                </div>
            </div>
        		</div>
        	</div>
        </div>
    </div>
    <!--End Quick View popup-->
    
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