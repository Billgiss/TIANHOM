<?php 
session_start();
include('server.php');
include('errors.php');
$o_id = $_GET['orderid'];


$user_check_query = "UPDATE order_table SET payment_status='YES' WHERE order_table.order_id = '$o_id'";
mysqli_query($mysqli, $user_check_query);

header("location: staff_paymentstatus.php");

?>