<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php
include "config.php";

// $sql="SELECT food.name,food.price,food.food_type,food.food_ingredients,food_images.food_id 
// as f_id, GROUP_CONCAT(food_images.images SEPARATOR ' , ') as images 
// FROM food INNER JOIN food_images ON food_images.food_id= food.id
//  INNER join food_type ON food_type.food_type=food.food_type 
//  GROUP BY food.id
//  ";
$sql="SELECT food.name,food.price,food.food_type,food.food_ingredients,food.food_type,food_images.food_id 
as f_id, GROUP_CONCAT(food_images.images SEPARATOR ' , ') as images 
FROM food INNER JOIN food_images ON food_images.food_id= food.id

 GROUP BY food.id";
//group by food_images.food_id 


$result = mysqli_query($conn, $sql);

?>

    <div class="container mt-3 ">
      <!-- Button link -->
      <a href="add_food.php" id="add_food" class="link-light text-decoration-none" > <button type="button" class="btn link-light">Add food</button></a>
 <!-- end -->
 <!-- table  -->
<table class="table">
  <thead>
    <tr>
     
      <th>Name</th>
      <th>Price</th>
      <th>ingredients</th>
      <th>Food Type</th>
      <th>Images</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
 <?php //foreach($foods as $k=>$food){
 // if ($result->num_rows > 0) {
    //$rows = $result->fetch_all(MYSQLI_ASSOC);
    $result=$conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
  
  foreach($rows as $row){
  $name = $row['name'];
  $price=$row['price'];
  $ing=$row["food_ingredients"];
  $type=$row["food_type"];
  $imageUrls = explode(' , ' , $row['images']);
 ?>
    <tr>
      <td><?php echo $name ?></td>
      <td><?php echo $price ?></td>
      <td><?php echo $ing ?></td>
<td><?php echo $type ?></td>
   
      <td>
<?php  


foreach ($imageUrls as $imageUrl) {
  $image_path="uploads/" .$imageUrl; 
  echo "<img src=' "  .$image_path . "  ' width='50' height='50' style='padding:1px' class='rounded'>";
}
?>
    </td>
<td>
    <a href="delete_food.php?id=<?php echo $row['f_id']; ?>" name="delete"><i class="fa-solid fa-trash-can fa-2xl" style="color: #1bf840;"></i></a>
    
    <a href="edit_food.php?id=<?php echo $row['f_id']; ?>" name="edit"><i class="fa-solid fa-pen fa-2xl" style="color: #1bf840;"></i></a>
  
</td>
      
    </tr>
 
<?php
  }

?>
</tbody>
</table>

</div>

<?php $conn->close();  ?>
<!-- end -->
<!-- script ajax to stya at admin page -->
<div id="food-container">
<script>

// $(document).ready(function(){
//   $('#add_food').click(function(e){
//     e.preventDefault();
//     var url = $(this).attr('href');
//     $.ajax({
//       url: url,
//       success: function(data){
//         $("#food-container").html(data);
//       }
//     });
//   });
// });
</script>
</div>
<!-- end -->
<!-- js bootsrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>