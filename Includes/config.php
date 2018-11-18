<?php

ob_start();
$timezone= date_default_timezone_set("Asia/Dhaka");
$con= mysqli_connect("localhost", "root", "", "muzik");
if(mysqli_errno($con))
{
    echo ' failed to connect   ' . mysqli_errno($con)  ;
    
    
    
}
    



?>
