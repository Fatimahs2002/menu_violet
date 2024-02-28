<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php 
include "config.php";
if(isset($_POST["submit"])){
   
    $user_name=$_POST["username"];
    $password=$_POST["password"];

    $sql="INSERT INTO `users`(`username`, `password`) VALUES ('$user_name','$password')";
    $result=$conn->query($sql);
    if($result===TRUE){
      header('location:users.php');
    }else{
        echo"Error".$sql."<br>".$conn->error;
    }
    $conn->close();
}
?>
<div class="container py-4 m-3 d-flex align-items-center gap-1">
  <i class="fa-solid fa-arrow-left fa-2xl"  style="color: #1bf840;"></i>
    <a href="admin.php" class="link-light text-decoration-none"> <button type="button" class="btn link-light">Back to home</button></a>
  </div>
    <section class="" style="background-color:white;">
  <div class="container py-5 w-100 ">
        <div class="card shadow-sm p-3 mb-5  rounded" style="border-radius: 1rem;">
              <div class="card-body text-black d-flex align-items-center  justify-content-center ">
                <form action="" method="post" >
                  
               
                  <div class="">
                  <label class="form-label" for="form2Example17">Username</label><br>
                    <input type="text" id="form2Example17" class="form-control-lg" name="username"  />
                   
                  </div>
               
                  <div class="">
                  <label class="form-label" for="form2Example27">Password</label><br>
                    <input type="text" id="form2Example27" class=" form-control-lg" name="password"  />
                
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-lg btn-block" type="submit" name="submit">submit</button>
                  </div>
     
          
           
         
                </form>
              </div>
            </div>
          </div>
        </div>
   
</section>
 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>