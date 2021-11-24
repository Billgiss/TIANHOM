<?php 
session_start();
include('server.php');
$errors=array();

if (isset($_POST['edit_submit'])){
    $name = mysqli_real_escape_string($mysqli, $_POST['fullname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
    $pwd = mysqli_real_escape_string($mysqli, $_POST['password']);
    $con_pwd = mysqli_real_escape_string($mysqli, $_POST['con_password']);


    if(empty($name)){
        array_push($errors, "FullName is required");
        $_SESSION['error']="FullName is required";
    }
    if(empty($email)){
        array_push($errors, "Email is required");
        $_SESSION['error']="Email is required";
    }
    if(empty($pwd)){
        array_push($errors, "Password is required");
        $_SESSION['error']="Password is required";
    }
    if($con_pwd != $pwd){
        array_push($errors, "The two passwords do not match");
        $_SESSION['error']="The two passwords do not match";
    }

    if (count($errors)==0){
        $id = $_SESSION["id"];
        $sql = "UPDATE customer SET name='$name', email='$email', pwd='$pwd', address='$address', gender='$gender' WHERE customer_id='$id'";
        mysqli_query($mysqli, $sql);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Your Profile is edited";
        header('location: customer.php');
    } 
    else{
        header("location: edit_customer.php");
    }

}
?>