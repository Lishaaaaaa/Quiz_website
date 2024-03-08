<?php


$conn=new mysqli("localhost","root","","quiz_website");
if($conn->connect_error)
{
    echo "Error in sql connrction";
    die;
}
?>