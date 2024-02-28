<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MENU</title>
  <!-- bootstrap 5 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- BOX ICONS CSS-->
  <!--<link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />-->
  <!-- custom css -->
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/bc.css">
</head>
<body>

<section class="vh-100" style="background-color:white;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./assets/img/admin.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width:400px;height:400px" />
            </div>
           <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="">
                  <label class="form-label" for="form2Example17">Username</label><br>
                    <input type="text" id="form2Example17" class="form-control-lg" name="username" />
                   
                  </div>
               
                  <div class="">
                  <label class="form-label" for="form2Example27">Password</label><br>
                    <input type="password" id="form2Example27" class=" form-control-lg" name="password" />
                
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-lg btn-block" type="submit" name="login">Login</button>
                  </div>
                  <?php 
    
    include "config.php";

    if($_POST){
        $username1 = $_POST['username'];
        $password1 = $_POST['password'];
  
        // Check if user exists in database
        $sql = "SELECT * FROM `users` WHERE `username`='$username1'and `password`='$password1'";
        $login=$conn->query($sql);
    //check if there is at least 
    if($login->num_rows>0){
        $user=$login->fetch_assoc(); 
            // User found, set session variables and redirect to home page
            $_SESSION['username'] = $user["username"];
            $_SESSION['password']=$user["password"];
            $_SESSION["login"]=true;
            header("Location:admin.php");
    }else{
        echo'<div class="alert  alert-dismissible fade show" role="alert" >
        <strong>Invalid username or password. Please try again.</strong> 
        <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label=""></button>
      </div>'.$conn->error;
      }
        }
       
    ?>
          
           
   
        
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- js -->
<script src="./assets/js/script.js"></script>

</body>
</html>