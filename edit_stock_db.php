<?php 
session_start();
include('server.php');
$errors=array();

if (isset($_POST['edit_submit'])){
    $name = mysqli_real_escape_string($mysqli, $_POST['Name']);
    $price = mysqli_real_escape_string($mysqli, $_POST['Price']);
    $stock = mysqli_real_escape_string($mysqli, $_POST['Stock']);


    if(empty($name)){
        array_push($errors, "Name is required");
    }
    if(empty($price)){
        array_push($errors, "Price is required");
    }
    if(empty($stock)){
        array_push($errors, "Stock is required");
    }

    if (count($errors)==0){
        $id = $_SESSION["product_id"];
        $sql = "UPDATE product SET product_name='$name', price='$price', stock='$stock' WHERE product_id='$id'";
        mysqli_query($mysqli, $sql);
        $_SESSION['success'] = "The stock is edited";
        header('location: staff_stock.php');
    } 
    else{
        array_push($errors, "Error!");
        $_SESSION['error']="Error!";
        header("location: edit_stock.php");
    }

}
?>