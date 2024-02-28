<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets_clients/img/favicon.png" rel="icon">
  <link href="assets_clients/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_clients/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_clients/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_clients/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_clients/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_clients/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets_clients/css/main.css" rel="stylesheet">

    <title>PalateWise</title>
    <style>
         .carousel-item img {

width:250px;
height: 200px; 


}


    </style>
</head>

<body> 
    <?php
    include "config.php";
    if (isset($_GET['food_type'])) {
        $food_type = $_GET['food_type'];
    
        $query = "SELECT food.name, food.price, food.food_ingredients, food_images.food_id as f_id, GROUP_CONCAT(food_images.images SEPARATOR ' , ') as images 
                  FROM food 
                  INNER JOIN food_images ON food_images.food_id = food.id
                  WHERE food.food_type = '$food_type' 
                  GROUP BY food.id";
        $result = mysqli_query($conn, $query);
    
        $type = "SELECT DISTINCT food_type FROM food where food_type='$food_type'";
        $result_type = mysqli_query($conn, $type);
    ?>
 <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
  <div class="tab-pane fade active show" id="menu-starters">
    <div class="tab-header text-center">
      <?php while ($row_type = mysqli_fetch_assoc($result_type)) { ?>
        <p>Menu</p>
        <h3><?php echo $row_type["food_type"]?></h3>
      <?php } ?>
    </div>
    <div class="row gy-6 cont ">
      <?php while ($row = $result->fetch_assoc()) {
          $imageUrls = explode(' , ', $row['images']); ?>
        <div class="col-lg-4 menu-item">
          <div id="carousel_<?php echo $row['f_id']; ?>" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators ">
              <?php foreach ($imageUrls as $key => $image) { ?>
                <button type="button" data-bs-target="#carousel_<?php echo $row['f_id']; ?>" data-bs-slide-to="<?php echo $key; ?>" <?php if ($key == 0) echo 'class="active "'; ?>></button>
              <?php } ?>
            </div>
            <div class="carousel-inner ">
              <?php foreach ($imageUrls as $key => $image) { ?>
                <div class="carousel-item <?php if ($key == 0) echo 'active'; ?>">
                  <?php $image_path = "uploads/" . $image; ?>
                  <img src="<?php echo $image_path; ?>" class="d-block w-50 rounded-circle mx-auto" alt="Image <?php echo $key + 1; ?>">
                </div>
              <?php } ?>
            </div>
          </div>
          <h4 class="name"><?php echo $row["name"] ?></h4>
          <p class="ingredients"><?php echo $row["food_ingredients"] ?></p>
          <p class="price"><?php echo $row["price"] ." $" ?></p>
        </div>
 <?php
      }
    }
  $conn->close();
             
  ?>
</div>
    <script src="assets_clients/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_clients/vendor/aos/aos.js"></script>
  <script src="assets_clients/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets_clients/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets_clients/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets_clients/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets_clients/js/main.js"></script>

</body>

</html>