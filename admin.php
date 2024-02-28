<?php session_start(); 
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MENU</title>
  <!-- bootstrap 5 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" href="./assets/css/style.css" />
  <!--icon-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

  <!-- Side-Nav -->
 
  <div class="side-navbar h-100 active-nav d-flex justify-content-between flex-wrap flex-column   fixed  position-fixed border-end shadow-sm p-3 mb-5 bg-body rounded " id="sidebar">
    <ul class="nav flex-column  w-100 p-3 justify-content-center align-items-center">
    <li class="nav-link hover-affected">
      <i class="fa-sharp fa-solid fa-list d-inline fa-2xl" style="color: #1bf840;" href="food_type.php" id="category" ></i>
     <a href="food_type.php" id="category" class="mx-2 d-inline  d-none d-lg-inline-flex link-dark" role="button" style="text-decoration:none"> Type</a>
   </li>
    <li  class="nav-link hover-affected">
        <i class="fa-solid fa-burger fa-2xl"  style="color: #1bf840;" id="food-btn" href="food.php"></i>
        <a href="food.php" class="mx-2 d-none d-lg-inline-flex link-dark" id="food-btn" role="button" style="text-decoration:none">Food</a>
      </li>
     
      


      
     

    </ul>


    <span class="nav-link  w-100 mb-5 border-top">

      <a class="text-body  nav-link hover-affected" data-bs-toggle="collapse" data-bs-target="#demo" href="">
        <i class="fa-solid fa-gear fa-2xl" style="color:  #1bf840;"></i>
        <span class=" h4 d-none d-lg-inline-flex">Settings</span></a>
      <div id="demo" class="collapse">
        <ul class="list-group border-0" id="">
          <li class="list-group-item border-0 " id="list">

            <a href="users.php" class="nav-link px-0 hover-affected" id="users" >
              <i class="fa-solid fa-users fa-xl" style="color: #1bf840;" ></i>
              <span class="d-none d-lg-inline-flex link-dark" >About Users</span></a>
          </li>
          <li class="list-group-item border-0 " id="list">
            <a href="logout.php" class="nav-link px-0 hover-affected">
              <i class="fa-solid fa-arrow-right-from-bracket fa-2xl" style="color:  #1bf840;"></i>
              <span class="d-none d-lg-inline-flex link-dark">Logout</span> </a>
          </li>
        </ul>
      </div>
    </span>
  </div>
  <!-- end sidebar-->
  <!-- Main Wrapper -->
  <div class="p-1 my-container active-cont">
    <!-- Top Nav -->
    <nav class="navbar top-navbar  px-5 border-bottom w-100 shadow-sm p-3 mb-5 bg-body rounded">
      <div class="">
        <span class="btn bg-light  d-inline " id="menu-btn">
          <i class="fa-solid fa-bars fa-2xl" style="color: #1bf840;"></i>
        </span>
      
      </div>


      <div class="d-flex flex-row-reverse bd-highlight">
        <!-- <img class="rounded-circle me-lg-2 " src="" alt="user" style="width: 40px; height: 40px;">
        <div class="dropdown">
          <a class="nav-link dropdown-toggle link-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Username
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item " href="#" id="item">Add Profile</a></li>
          </ul>
        </div> -->
        <span class=" h5 d-inline p-2">BestFood</span>
      </div>

    </nav>
    <!--End Top Nav -->
<!-- main contant -->
<div id="food-container">
<script>
  $(document).ready(function(){
    $('#food-btn, #offer, #category, #users, #message').click(function(e){
      e.preventDefault();
      var url = $(this).attr('href');
      $.ajax({
        url: url,
        success: function(data){
          $("#food-container").html(data);
        }
      });
    });
  });
</script>

</div>
  </div>

  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <!-- js -->
  <script src="./assets/js/script.js"></script>
</body>

</html>