<?php

include_once("dbconfig.php");

session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];

    $password = $_POST['password'];
        $password = md5($password);
//    echo  $password = $_POST['password'];
//     echo "<br>";                           
//    echo  $password = md5($password);

//    ata diye test korlam je  amr md5 & password dekhacche ki na   & thik ache ki na

    $result = $db->query("SELECT * FROM post WHERE email = '$email' AND password = '$password'");

    $row = $result->fetch_assoc();
    
    if($result->num_rows == 0){
        $_SESSION['login_error'] = "Email or password may be wrong. please try again";
        header("location: index.php");
    }
    else{
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['fullname'];
        header("location: dashboard.php");
    }
}