<?php 
session_start();
include('server.php');
$errors=array();
$cus_id=$_SESSION["cus_id"];
$product=$_GET['productid'];

$query = "SELECT * FROM cart WHERE customer_id='$cus_id'";
$result = mysqli_query($mysqli, $query);
if(mysqli_num_rows($result)==0){
    $query0 = "INSERT INTO cart(customer_id) values ('$cus_id')";
    mysqli_query($mysqli, $query0);
}
$query10 = "SELECT * FROM cart WHERE customer_id='$cus_id'";
$result10 = mysqli_query($mysqli, $query10);
    while($row=$result10->fetch_array()){
        $cart_id=$row["cart_id"];
        
    }
$query = "SELECT * FROM cart_details WHERE cart_id='$cart_id' and product_id='$product'";
$result = mysqli_query($mysqli, $query);

$query1 = "SELECT price FROM product WHERE product_id='$product'";
$result1 = mysqli_query($mysqli, $query1);
while($row=$result1->fetch_array()){
$price1 = floatval($row['price']);
}
if(mysqli_num_rows($result)==0){
    echo $cart_id;
    echo $product;
    echo $price1;
    $query = "INSERT INTO cart_details(cart_id,product_id,quantity,total_price) values ('$cart_id','$product',1,'$price1')";
    $result = mysqli_query($mysqli, $query);
    $query2 = "SELECT sum(total_price) as sumprice FROM cart_details WHERE cart_id = $cart_id";
    $result2 = mysqli_query($mysqli, $query2);
    while($row=$result2->fetch_array()){
        $total_price = floatval($row['sumprice']);
        }

    $query3 = "UPDATE cart SET price = $total_price";
    mysqli_query($mysqli, $query3);
}
else{
    $query = "UPDATE cart_details SET quantity=quantity+1 where cart_id='$cart_id' and product_id='$product'";
    $result = mysqli_query($mysqli, $query);
    $query1 = "UPDATE cart_details SET total_price=quantity*$price1 where cart_id='$cart_id' and product_id='$product'";
    $result1 = mysqli_query($mysqli, $query1);

    $query2 = "SELECT sum(total_price) as sumprice FROM cart_details WHERE cart_id = $cart_id";
    $result2 = mysqli_query($mysqli, $query2);
    while($row=$result2->fetch_array()){
        $total_price = floatval($row['sumprice']);
        }

    $query3 = "UPDATE cart SET price = $total_price";
    mysqli_query($mysqli, $query3);
}



$query = "UPDATE cart SET cart.price=sum(cart_details.quantity*product.price) where cart_id='$cart_id'";
$result = mysqli_query($mysqli, $query);
header("location: shop.php");

?>