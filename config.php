<?php

$db = mysqli_connect("localhost","root","","uni2go");
$con = mysqli_select_db($db,"uni2go");

if($con)
{
    
}
else
{
    die("connection failed".mysqli_connect_error());

}


?>