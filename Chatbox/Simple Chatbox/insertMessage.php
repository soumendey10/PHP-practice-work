<?php
session_start();
include("DBConnection.php");

$fromUser = $_POST["fromUser"];
$toUser = $_POST["toUser"];
$message= $_POST["message"];

$output="";

$sql = "INSERT INTO messages (FromUser, ToUser, Message) 
VALUES('$fromUser', '$toUser', '$message')";

if($connect->query($sql))
{
    $output.="";
}
else
{
    $output.="Error. Please try again.";
}
    echo $output;
?>