<?php
session_start();
include("server.php");
include('errors.php');
$productid = $_GET['productid'];
$cus_id = $_SESSION['cus_id'];

$q0 = "SELECT cart_id from cart WHERE customer_id = $cus_id";
$result0 = mysqli_query($mysqli,$q0);
while($row=$result0->fetch_array()){
    $cart_id = $row['cart_id'];
}

$q = "SELECT price from product WHERE product_id = $productid";
$result = mysqli_query($mysqli,$q);
while($row=$result->fetch_array()){
  echo $row['price'];
  $price = $row['price'];
  }
$q1 = "UPDATE cart_details SET quantity = quantity + 1 WHERE product_id = $productid AND cart_id = $cart_id";
mysqli_query($mysqli,$q1);
$q2 = "UPDATE cart_details SET total_price = quantity * $price  WHERE product_id = $productid AND cart_id = $cart_id";
mysqli_query($mysqli,$q2);
$query2 = "SELECT sum(total_price) as sumprice FROM cart_details WHERE cart_id = $cart_id";
$result2 = mysqli_query($mysqli, $query2);
while($row=$result2->fetch_array()){
        $total_price = floatval($row['sumprice']);
        }
$q3 = "UPDATE cart SET price = $total_price";
mysqli_query($mysqli,$q3);
echo "UPDATE";
	

header("Location: cart.php");	
	
?>