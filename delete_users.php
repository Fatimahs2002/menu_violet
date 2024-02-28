<?php
include "config.php";

$id=$_GET['id'];
$sql="DELETE FROM `users` WHERE id='$id'";
$result=$conn->query($sql);
if($result===TRUE){
header('location:users.php');
}else{
    echo"error deleting record".$sql."<br>".$conn->error;
}
$conn->close();

?>