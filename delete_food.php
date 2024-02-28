<?php
include "config.php";

$id=$_GET['id'];
//$id_i=$_GET['Food_images.id'];
$sql="DELETE  FROM `food` WHERE id='$id' ;
DELETE  FROM `food_images` WHERE id='$id';
";
$result=$conn->multi_query($sql);
if($result===TRUE){
    header('location:food.php');
}else{
    echo"error deleting record".$sql."<br>".$conn->error;
}



$conn->close();

?>