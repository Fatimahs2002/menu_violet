<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food Type</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <!--icon-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- css -->
<link rel="stylesheet" href="./assets/css/style.css">
<!--  -->
  </head>
<body>
<?php
include "config.php";

$id=$_GET['id'];

$sql="SELECT * FROM food_type WHERE id='$id'";
$result=$conn->query($sql);
$type=$result->fetch_assoc();
if($_POST){
$id_type=$_POST["id"];
$type=$_POST["type"];
 
 $sql="UPDATE `food_type` SET `food_type`='$type' WHERE id='$id_type'";

if($conn->query($sql)===TRUE){
     // echo"record updated succesfully";                    
 header('location:food_type.php');
}else{
  echo" error updated".$conn->error;
}
}
 $conn->close();
?>
<!-- back home -->
<div class="container py-4 m-3 d-flex align-items-center gap-1">
  <i class="fa-solid fa-arrow-left fa-2xl"  style="color: #1bf840;"></i>
    <a href="admin.php" class="link-light text-decoration-none"> <button type="button" class="btn link-light">Back to home</button></a>
  </div>
<!-- end -->

<section class="" style="background-color:white;">
  <div class="container py-1 w-100 ">
        <div class="card shadow-sm p-3 mb-5  rounded " style="border-radius: 1rem;">
              <div class="card-body text-black d-flex align-items-center  justify-content-center ">
                <form action="" method="post">
                  <div class="" hidden>
                  <label class="form-label" for="form2Example17">ID</label><br>
                    <input type="text" id="form2Example17" class="form-control-lg" name="id" value="<?php echo $type["id"]?>"/>
                  </div>
               
                  <div class="">
                  <label class="form-label" for="form2Example17">Food_type</label><br>
                    <input type="text" id="form2Example17" class="form-control-lg" name="type" value="<?php echo $type["food_type"]?>" />
                  </div>
               
                  

                  <div class="pt-1 mb-4">
                    <button class="btn btn-lg btn-block" type="submit" name="submit">submit</button>
                  </div>
     
                  <!--<div class="alert  alert-dismissible fade show" role="alert"  name="msg" style="display: none;">
            <strong>record update seccefully.</strong> 
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label=""></button>
          </div>-->
           
         
                </form>
              </div>
            </div>
          </div>
        </div>
   
</section>
 
      

               
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>