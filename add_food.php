<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php 
include "config.php";
$query="SELECT * FROM `food_type` ";

$result = mysqli_query($conn, $query);
$types = $result->fetch_all(MYSQLI_ASSOC);

if(isset($_POST["submit"])){
 
    $food=$_POST["food"];
    $price=$_POST["price"];
    $ing=$_POST["ingredients"];
  $food_type=$_POST["select"];
  //var_dump($food_type);
    $sql1 = "INSERT INTO `food`(`name`, `price`, `Food_ingredients`,`food_type`) VALUES ('$food','$price','$ing','$food_type')";
     
    if ($conn->query($sql1) === TRUE) {
        // echo "New user created successfully";
        $food_id = $conn->insert_id; // get last inserted id
        // var_dump($client_id);exit;
        if ($food_id) {

          if ($_FILES) {
            // var_dump($_FILES);exit;
            $target_dir = "uploads/";
            $count = count($_FILES['image']['name']);
            for ($i = 0; $i < $count; $i++) {
                $target_file = $target_dir . basename($_FILES["image"]["name"][$i]);
                $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $img_name = str_replace("." . $extension, "", basename($_FILES["image"]["name"][$i]));
                $j = 0;
                while (file_exists($target_file)) {
                    $new_image = $img_name . "-" . $j . "." . $extension;
                    $target_file = $target_dir . $new_image;
                    $j++;
                }
              
                $res = move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_file);
              
                if ($res) {
                    $image_name = basename($target_file);
                    // var_dump($image_name);exit;
                    // add image to database
                  
                    $sql2 = "INSERT INTO `food_images`(`images`, `food_id`) VALUES ('$image_name','$food_id')";
                    if ($conn->query($sql2) === TRUE) {
                     header('location:food.php');
                     echo"done";
                    } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }
            }
        
        
        }
       
    } 
       
      }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
    $conn->close();
?>
<div class="container py-4 m-3 d-flex align-items-center gap-1">
  <i class="fa-solid fa-arrow-left fa-2xl"  style="color: #1bf840;"></i>
    <a href="admin.php" class="link-light text-decoration-none"> <button type="button" class="btn link-light">Back to home</button></a>
  </div>
    <section class="" id="add_food" style="background-color:white;">
  <div class="container py-1 w-100 ">
        <div class="card shadow-sm p-3 mb-5  rounded" style="border-radius: 1rem;">
              <div class="card-body text-black d-flex align-items-center  justify-content-center ">
                <form action="" method="post"  enctype="multipart/form-data">
                <div class="" hidden>
                  <label class="form-label" for="form2Example17">ID</label><br>
                    <input type="text" id="form2Example17" class="form-control-lg" name="id"  />
                   
                  </div>
               
                  <div class="">
                  <label class="form-label" for="form2Example17">Food</label><br>
                    <input type="text" id="form2Example17" class="form-control-lg" name="food"  />
                   
                  </div>
               
                  <div class="">
                  <label class="form-label" for="form2Example27">price</label><br>
                    <input type="text" id="form2Example27" class=" form-control-lg" name="price"  />
                
                  </div>
                  <div class="">
                  <label class="form-label" for="form2Example27">Food ingredients</label><br>
                    <textarea cols="23" rows="5" id="form2Example27" class=" form-control-lg" name="ingredients"  ></textarea>
                
    </div>
    <div>
     
    <label class="form-label" for="form2Example27">Food Type</label><br>
    
    <select class="select form-control-lg" name="select">
    <?php 
      foreach($types as $type){
      ?>
  <option value="<?php  echo $type["food_type"]?>"><?php  echo $type["food_type"]?></option>
  <?php } ?>
    </select>      
    

</div>
                  <div class="">
                  <label class="form-label" for="form2Example17" hidden>Image</label><br>
                  <input type="file" class="form-control-lg file"  name="image[]" multiple/>
                   
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