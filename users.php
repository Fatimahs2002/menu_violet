<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php
include "config.php";

$sql="SELECT * FROM `users`";

$result=$conn ->query($sql);
$users=$result->fetch_all(MYSQLI_ASSOC);
?>

    <div class="container mt-3 ">
    <a href="add_users.php"id="add_users" class="link-light text-decoration-none"><button type="button" class="btn">Add Users</button></a>
<table class="table ">
  <thead>
    <tr>
     
      <th>Username</th>
      <th>Password</th>
      <th>action</th>
    </tr>
  </thead>
  <tbody>
  <?php
           foreach($users as $k=>$user){
            ?>
    <tr>
      <th><?php echo $user["username"] ?></th>
      <td><?php echo $user["password"]?></td>
      <td><a href="delete_users.php?id=<?php echo $user['id']; ?>" name="delete" ><i class="fa-solid fa-trash-can fa-2xl" style="color: #1bf840;"></i></a>
    
      <a href="edit_users.php?id=<?php echo $user['id']; ?>" name="edit"><i class="fa-solid fa-pen fa-2xl" style="color: #1bf840;"></i></a>
    
</td>
      
    </tr>
   <?php } ?>
  </tbody>
</table>
</div>
<div id="food-container"></div>
<script>
//   $(document).ready(function(){
//   $('#add_users').click(function(e){
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>