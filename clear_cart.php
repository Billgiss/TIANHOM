<?php
session_start();
include('server.php');
$cus_id = $_SESSION['cus_id'];

$query = "SELECT * FROM cart WHERE customer_id='$cus_id'";
$result = mysqli_query($mysqli, $query);
while($row=$result->fetch_array()){
    $cart_id=$row["cart_id"];   
}

$q="DELETE FROM cart WHERE cart_id = $cart_id";
mysqli_query($mysqli,$q);


header('Location: cart.php');
?>