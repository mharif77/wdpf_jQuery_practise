<?php
require_once "dbconfig.php";
session_start();
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $usertype = $_POST['usertype'];
}

if ($usertype == 1) {
    $sql = $db->query("SELECT * FROM admin WHERE email = '$email' AND password = '$password'");
    if ($sql->num_rows) {
        //session
        $_SESSION['email'] = $email;
        $_SESSION['usertype'] = $usertype;
        header("location:dashboard.php");
        //redirect
    }
}
if ($usertype == 2) {
    $sql2 = $db->query("SELECT * FROM doctors WHERE docEmail = '$email' AND password = '$password'");
    if ($sql2->num_rows) {
        //session
        $_SESSION['email'] = $email;
        $_SESSION['usertype'] = $usertype;
        header("location:doctor_dashboard.php");
        //redirect
    }
}
if ($usertype == 3) {
    $sql3 = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    if ($sql3->num_rows) {
        //session
        $_SESSION['email'] = $email;
        $_SESSION['usertype'] = $usertype;
        header("location:patient_dashboard.php");
        //redirect
    }
}

?>