<?php 
    session_start();
    include('server.php');
    include('errors.php');
    $errors = array();

    if(isset($_POST['sm'])){
        $email = $_POST['email'];
        $message = $_POST['message'];
        $query = "SELECT customer_id FROM customer WHERE email = '$email'";
        $result = mysqli_query($mysqli, $query);
    
        
        if (mysqli_num_rows($result)==1){
            while($row=$result->fetch_array()){
                $id = $row["customer_id"];
            }
                $query2 = "INSERT INTO message(customer_id,message,email) VALUES ('$id','$message','$email')";
                mysqli_query($mysqli, $query2);
                $_SESSION['success']="Message sent!";
                header("location: contact-us.php");
        }
    
        else {
                array_push($errors, "Wrong email!");
                $_SESSION['error']="Wrong email, try again!";
                header("location: contact-us.php");
        }
    
}
    

        
        
    
?>