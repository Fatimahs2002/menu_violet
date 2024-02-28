<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
  

<?php 
include "config.php";

?>

<main id="main">
     <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Menu</h2>
          <p>Check Our <span>Yummy Menu</span></p>
        </div>
        <?php
        $query = "SELECT DISTINCT `food_type` FROM `food`";
    $result = mysqli_query($conn, $query);
    echo "<ul class='nav nav-tabs d-flex justify-content-center' data-aos='fade-up' data-aos-delay='200' >";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li class='nav-item' >
        <a href='#'class='nav-link active show' data-bs-toggle='tab' data-bs-target='#menu-starters' onclick='showFoodItems(\"".$row['food_type']."\")'>";
  echo" <h4>".$row['food_type']." </h4>";
  echo"</a>";
  echo"</li>";
      }
    echo "</ul>";
?><!--
        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a href="#" class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters" onclick="showFoodItems( \" <?php '.$row["food_type"].' ?> \" )  " >
              <h4><?php // echo $type["food_type"]?></h4>
            </a>
          </li>-->
          <?php // } ?>

          
      
          <div id="food-items"></div>
    </div>

</section><!-- End Menu Section -->
</main>
   <script >
function showFoodItems(food_type) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("food-items").innerHTML = this.responseText;
        }
    };
    /*xhttp.open("GET", "tjrbe2.php?food_type="+food_type, true);*/
    xhttp.open("GET", "display_menu.php?food_type="+food_type, true);
    xhttp.send();
}

    </script>
    </body>
</html>