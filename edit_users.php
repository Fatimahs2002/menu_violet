<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>

<body>
<?php
include "config.php";

$id=$_GET['id'];

$sql="SELECT * FROM users WHERE id='$id'";
$result=$conn->query($sql);
$user=$result->fetch_assoc();
if($_POST){
$id_user=$_POST["id"];
$user_name=$_POST["username"];
 $password=$_POST["password"];
 $sql="UPDATE `users` SET `username`='$user_name',`password`='$password' WHERE id='$id_user'";

if($conn->query($sql)===TRUE){
    header('location:users.php') ;   
 
}else{
  echo" error updated".$conn->error;
}
}
 $conn->close();
?>
<div class="container py-4 m-3 d-flex align-items-center gap-1">
  <i class="fa-solid fa-arrow-left fa-2xl"  style="color: #1bf840;"></i>
    <a href="admin.php" class="link-light text-decoration-none"> <button type="button" class="btn link-light">Back to home</button></a>
  </div>
<section class="" style="background-color:white;">
  <div class="container py-5 w-100 ">
        <div class="card shadow-sm p-3 mb-5  rounded " style="border-radius: 1rem;">
              <div class="card-body text-black d-flex align-items-center  justify-content-center ">
                <form action="" method="post">
                  <div class="" hidden>
                  <label class="form-label" for="form2Example17">ID</label><br>
                    <input type="text" id="form2Example17" class="form-control-lg" name="id" value="<?php echo $user["id"]?>"/>
                  </div>
               
                  <div class="">
                  <label class="form-label" for="form2Example17">Username</label><br>
                    <input type="text" id="form2Example17" class="form-control-lg" name="username" value="<?php echo $user["username"]?>" />
                   
                  </div>
               
                  <div class="">
                  <label class="form-label" for="form2Example27">Password</label><br>
                    <input type="text" id="form2Example27" class=" form-control-lg" name="password" value="<?php echo $user["password"]?>" />
                
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