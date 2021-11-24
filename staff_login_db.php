<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if(isset($_POST['login_submit'])){
        $email = $_POST['staff_email'];
        $pwd = $_POST['staff_password'];

        if(empty($email)){
            array_push($errors, "Email is required");
        }

        if(empty($pwd)){
            array_push($errors, "Password is required");
        }

        if (count($errors)==0){
            $query = "SELECT * FROM staff WHERE staff_email = '$email' AND staff_pwd = '$pwd'";
            $result = mysqli_query($mysqli, $query);
    

        if (mysqli_num_rows($result)==1){
                $_SESSION['email']=$email;
                $_SESSION['success']="You are now logged in";
                header("location: staff.php");
        } 
        else {
                array_push($errors, "Wrong email/password combination");
                $_SESSION['error']="Wrong username or password try again!";
                header("location: login.php");
            }
        }
        
    }
?>