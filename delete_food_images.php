<?php 
include "config.php";
$id=$_GET['id'];
$sql="DELETE FROM `food_images` WHERE id='$id'";
$result=$conn->query($sql);
if($result===TRUE){
echo"removed";

}//else{
   // echo"error deleting record".$sql."<br>".$conn->error;
//}
$conn->close();


?>