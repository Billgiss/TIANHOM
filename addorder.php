<?php
session_start();
include('server.php');
$cus_id = $_SESSION['cus_id'];

$query = "SELECT * FROM cart WHERE customer_id='$cus_id'";
$result = mysqli_query($mysqli, $query);
while($row=$result->fetch_array()){
    $cart_id=$row["cart_id"];   
}
$query2 = "SELECT price from cart WHERE cart_id = '$cart_id'";
$result2 = $mysqli->query($query2);
while($row=$result2->fetch_array()){
    $price=$row["price"];   
}
$query3 = "INSERT order_table(customer_id, total_price, staff_id, payment_status) values ('$cus_id','$price',1,'No')";
$result3 = mysqli_query($mysqli, $query3);

$query4 = "SELECT * FROM order_table WHERE customer_id='$cus_id'";
$result4 = mysqli_query($mysqli, $query4);
while($row=$result4->fetch_array()){
    $o_id=$row["order_id"];   
}
$query5 = "SELECT product.product_id as id, product.img as img, product.price as price, product.product_name as pname, cart_details.quantity as quantity, cart_details.total_price as tp from cart_details inner join product WHERE cart_details.cart_id='$cart_id' and cart_details.product_id = product.product_id";
$result5 = $mysqli->query($query5);
while($row=$result5->fetch_array()){
    $tp=$row['tp'];
    $quantity=$row['quantity'];
    $p_id=$row['id'];
    $query6 = "INSERT INTO orderdetails(`order_id`,`quantity`,`total_price`,`product_id`) VALUES (($o_id),($quantity),($tp),($p_id))";
    $query7 = "UPDATE product SET stock=stock-$quantity WHERE product_id = $p_id";
    mysqli_query($mysqli,$query7);
    if (mysqli_query($mysqli,$query6)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $query6 . "" . mysqli_error($mysqli);
    }
}



$q="DELETE FROM cart WHERE customer_id = '$cus_id'";
mysqli_query($mysqli,$q);

header('Location: thankyou.php');
?>