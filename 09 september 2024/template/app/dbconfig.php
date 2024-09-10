<?php 

define("HOST","localhost");
define("USR","root");
define("PASS","");
define("DATABASE","need");
$db = new mysqli();
@$db->connect(HOST,USR,PASS,DATABASE);
        if($db->connect_errno){
            echo  $db->connect_error;
            exit();
        }
        echo $db->error;


?>