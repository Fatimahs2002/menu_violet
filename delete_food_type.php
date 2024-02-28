<?php 
include "config.php";

$id=$_GET['id'];

$sql="DELETE FROM `food_type` WHERE id='$id';

;

";
$result=$conn->multi_query($sql);
if($result===TRUE){
  header('location:food_type.php');

}else{
    echo"error deleting record".$sql."<br>".$conn->error;
}



?>