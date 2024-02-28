<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Offer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!--icon-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <!-- css -->
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <?php
  include "config.php";

  $id = $_GET['id'];

  $sql = "SELECT * FROM offers WHERE id='$id'";
  $result = $conn->query($sql);
  $offer = $result->fetch_assoc();

  if ($_POST) {
    $id_offer = $_POST["id"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    if ($_FILES) {
      $image_name = $_FILES["images"]["name"];
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["images"]["name"]);
      // $result=move_uploaded_file($_FILES["images"]["tmp_name"],$target_file);
      if (isset($image_name)) {
        $sql = "UPDATE offers SET description='$description',price='$price',image= '$image_name' WHERE id='$id_offer'";
        if ($conn->query($sql) === TRUE) {
          header('location:offers.php');
        } else {
          echo "Error updating record: " . $conn->error;
        }
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $img_name = str_replace("." . $extension, "", basename($_FILES["images"]["name"]));
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["images"]["name"]);

        while (file_exists($target_file)) {
          $count = 0;
          $new_image = $img_name . "-" . $count . "." . $extension;
          $image_name = $new_image;

          $target_file = $target_dir . $new_image;
          //var_dump($target_file);
          $count++;
        }

        $result = move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
      } else {
        $update = $_FILES["update_image"]["name"];
        $sql1 = "UPDATE offers SET description='$description',price='$price' WHERE id='$id_offer'";
        if ($conn->query($sql1) === TRUE) {
          header('location:offers.php');
        } else {
          echo "Error updating record: " . $conn->error;
        }
      }
    }
  }
  ?>
  <!-- back home -->
  <div class="container py-4 m-3 d-flex align-items-center gap-1">
  <i class="fa-solid fa-arrow-left fa-2xl"  style="color: #1bf840;"></i>
    <a href="admin.php" class="link-light text-decoration-none"> <button type="button" class="btn link-light">Back to home</button></a>
  </div>
<!-- end -->
  <!-- edit -->
  <section class="" style="background-color:white;">
    <div class="container py-2 w-100 ">
      <div class="card shadow-sm p-3 mb-5  rounded " style="border-radius: 1rem;">
        <div class="card-body text-black d-flex align-items-center  justify-content-center ">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="" hidden>
              <label class="form-label" for="form2Example17">ID</label><br>
              <input type="text" id="form2Example17" class="form-control-lg" name="id" value="<?php echo $offer["id"] ?> " />

            </div>

            <div class="">
              <label class="form-label" for="form2Example17">price</label><br>
              <input type="text" id="form2Example17" class="form-control-lg" name="price" value="<?php echo $offer["price"] ?>" />

            </div>

            <div class="">
              <label class="form-label" for="form2Example27">Description</label><br>
              <input type="textarea" id="form2Example27" class=" form-control-lg" name="description" value="<?php echo $offer["description"] ?>" />

            </div>
            <div class="">
              <label class="form-label" for="form2Example17">Image</label><br>
              <input type="file" id="form2Example17" class="form-control-lg file" name="image" />

            </div>


            <div class="">
              <img src="uploads/<?php echo $offer["image"] ?>" alt="" height="100px" width="100px" name="update_image">

            </div>


            <div class="pt-1 mb-4">
              <button class="btn btn-lg btn-block " type="submit" name="submit">submit</button>
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