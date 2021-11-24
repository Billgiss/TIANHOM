<?php 
session_start();
include('server.php');
$errors=array();

if (isset($_POST['reg_submit'])){
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

    $user_check_query = "SELECT * FROM customer WHERE email='$email'";
    $query = mysqli_query($mysqli, $user_check_query);
    $result=mysqli_fetch_assoc($query);

    if($result){
        if ($result['email'] == $email) {
            array_push($errors, "Email already exists");
            $_SESSION['error']="Email already exists";
        }
    }
    if (count($errors)==0){
        $sql = "INSERT INTO customer(name, email, pwd, address, gender) VALUES('$name','$email','$pwd','$address', '$gender')";
        mysqli_query($mysqli, $sql);
        $sql2="SELECT * FROM customer WHERE email='$email'";
        $result2=mysqli_query($mysqli, $sql2);
        while($row=$result2->fetch_array()){
            $_SESSION['cus_id']=$row['customer_id'];
        }
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    } 
    else{
        header("location: register.php");
    }

}
?>