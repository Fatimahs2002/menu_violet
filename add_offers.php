<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Offer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
<style>
.btn{
shadow:none;
}
</style>
  </head>
<body>
<?php 
include "config.php";
if($_POST){
   
    $price=$_POST["price"];
    $description=$_POST["description"];
   $target_dir="uploads/";
  $target_file=$target_dir.basename($_FILES["image"]["name"]);


    $image_name=$_FILES["image"]["name"];
    

    //$result=move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);

    
    //var_dump($_FILES);
$sql="insert into offers(image,price,description) values('$image_name','$price','$description')";
if($conn->query($sql)===TRUE){
    header('location:offers.php');
}else{
    echo"Error" .$sql."<br>" .$conn->error;
}

$extension=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$img_name=str_replace(".".$extension,"",basename($_FILES["image"]["name"]));
$target_dir="uploads/";
$target_file=$target_dir.basename($_FILES["image"]["name"]);

while(file_exists($target_file)){
    $count=0;
    $new_image=$img_name."-". $count.".".$extension;
    $image_name=$new_image;
    
    $target_file=$target_dir.$new_image;
    //var_dump($target_file);
   $count++;

}

$result=move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
   }


$conn->close();
?>
<div class="container py-4 m-3 d-flex align-items-center gap-1">
  <i class="fa-solid fa-arrow-left fa-2xl"  style="color: #1bf840;"></i>
    <a href="admin.php" class="link-light text-decoration-none"> <button type="button" class="btn link-light">Back to home</button></a>
  </div>
    <section class="" style="background-color:white;">
  <div class="container py-1 w-100 ">
        <div class="card shadow-sm p-3 mb-5  rounded" style="border-radius: 1rem;">
              <div class="card-body text-black d-flex align-items-center  justify-content-center ">
                <form action="" method="post" enctype="multipart/form-data">
                  
               
                  <div class="">
                  <label class="form-label" for="form2Example17">Image</label><br>
                  <input type="file" class=" form-control-lg file"  name=image />
                   
                  </div>
               
                  <div class="">
                  <label class="form-label" for="form2Example27">Price</label><br>
                    <input type="text" id="form2Example27" class=" form-control-lg" name="price"  />
                
                  </div>
                  <div class="">
                  <label class="form-label" for="form2Example27">Description</label><br>
                    <input type="text" id="form2Example27" class=" form-control-lg" name="description"  />
                
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