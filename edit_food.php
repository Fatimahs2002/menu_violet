<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Food</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!--icon-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <!-- css -->
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <?php
  include "config.php";
  $query = "SELECT * FROM `food_type` ";

  $result = mysqli_query($conn, $query);
  $types = $result->fetch_all(MYSQLI_ASSOC);
  $id = $_GET['id'];
  $sql = "SELECT * FROM food where id='$id' ";
  $result = $conn->query($sql);
  $items = $result->fetch_assoc();
  $id = $items["id"];

  //var_dump($id);
  $sql1 = "SELECT  *,food_images.id as image_id FROM `food` INNER join `food_images` on food_images.food_id=food.id  where food_id='$id'";
  $result = $conn->query($sql1);
  //$row = $result->fetch_assoc();





  if ($_POST) {
    $id_food = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $ingredients = $_POST["ingredients"];

    $food_type = $_POST["type"];
   // var_dump($food_type);





    if ($_FILES) {
      // var_dump($_FILES);exit;
      $target_dir = "uploads/";
      $count = count($_FILES['images']['name']);
      for ($i = 0; $i < $count; $i++) {
        $target_file = $target_dir . basename($_FILES["images"]["name"][$i]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $img_name = str_replace("." . $extension, "", basename($_FILES["images"]["name"][$i]));
        $j = 0;
        while (file_exists($target_file)) {
          $new_image = $img_name . "-" . $j . "." . $extension;
          $target_file = $target_dir . $new_image;
          $j++;
        }

        $res = move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target_file);

        if ($res) {
          $image_name = basename($target_file);
          // $food_id = $conn->insert_id; // get last inserted id
          // var_dump($client_id);exit;
          //if ($food_id) {
          // $sql3 = "INSERT INTO food_images (food_id,images)
          // VALUES ('$food_id','$images')";
          $sql2 = "UPDATE `food` SET `name`='$name',`price`='$price' , `Food_ingredients` = '$ingredients',`food_type`='$food_type' WHERE id='$id';
           
             
             ";
          if ($conn->query($sql2)) {
            //header('location:food.php');
            //$foods_id=$_GET["food_images.id"];
            $sql3 = "INSERT into `food_images`(`images`,`food_id`) values ('$image_name','$id')";
          } else {
            echo "error updatating record" . $sql . "<br>" . $conn->error;
          }

          //if($foods_id){


          if ($conn->query($sql3) === TRUE) {
            header('location:food.php');
          } else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
          }
        } else {
          $sql4 = "UPDATE `food` SET `name`='$name',`price`='$price' , `Food_ingredients` = '$ingredients',`food_type`='$food_type' WHERE id='$id'";


          if ($conn->query($sql4) === TRUE) {
            header('loacation:food.php');
          } else {
            echo "Error: " . $sql4 . "<br>" . $conn->error;
          }
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
  <section class="container-fluid" style="background-color:white;">
    <div class=" py-1 w-100 ">
      <div class="card shadow-sm p-3 mb-5  rounded " style="border-radius: 1rem;">
        <div class="card-body text-black d-flex align-items-center  justify-content-center ">
          <form action="" method="post" enctype="multipart/form-data">

            <div class="" hidden>
              <label class="form-label" for="form2Example17">ID</label><br>
              <input type="text" id="form2Example17" class="form-control-lg" name="id" value="<?php echo $items["id"] ?>" />
            </div>

            <div class="">
              <label class="form-label" for="form2Example17">Name</label><br>
              <input type="text" id="form2Example17" class="form-control-lg" name="name" value="<?php echo $items["name"] ?>" />

            </div>

            <div class="">
              <label class="form-label" for="form2Example27">Price</label><br>
              <input type="text" id="form2Example27" class=" form-control-lg" name="price" value="<?php echo $items["price"] ?>" />

            </div>
            <div class="">
              <label class="form-label" for="form2Example27">Food_ingredients</label><br>
              <textarea cols="23" rows="5" id="form2Example27" class=" form-control-lg" name="ingredients"><?php echo $items["food_ingredients"] ?></textarea>

            </div>
            <div class="">
              <label class="form-label" for="form2Example27">Food Type</label><br>
              <select class="select form-control-lg" name="type">
                <?php
                foreach ($types as $type) {
                ?>
                  <option value="<?php echo $type["food_type"] ?>"><?php echo $type["food_type"] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="">
              <label class="form-label" for="form2Example17" hidden>Image</label><br>
              <input type="file" class="form-control-lg file" name="images[]" multiple />
            </div>
            <br>
            <!-- imges -->
            <div class="image-container">
              <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $image_name = $row["images"];
              ?>
                  <div class="image-wrapper">
                    <img src="uploads/<?php echo $image_name; ?>" alt="" class="rounded" name="picture">
                  <!--  <a href="delete_food_images.php?id=<?php //echo $row["image_id"] ?>" class="link-light text-decoration-none"><button type="button" class="btn btn-remove">Remove</button></a>-->
<?php
echo"<a href='#' onclick='showFoodItems(\"".$row['id']."\")' class='link-light text-decoration-none' ><button type='button' class='btn btn-remove'>Remove</button></a>";
 ?>
                  </div>
              <?php
                }
              }
              $conn->close();
              ?>
              <script>
              function showFoodItems(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("image-container").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "delete_food_images.php?id="+id, true);
    xhttp.send();
}
</script>
            </div>



            <div class="pt-1 mb-4">
              <button class="btn btn-lg btn-block" type="submit" name="submit">submit</button>
            </div>
            <!--<div class="alert  alert-dismissible fade show" role="alert"  name="msg" style="display: none;">
            <strong>record update seccefully.</strong> 
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label=""></button>
          </div> -->
          </form>
        </div>
      </div>
    </div>
  </section>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>