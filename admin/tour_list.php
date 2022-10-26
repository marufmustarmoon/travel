<?php

$select = mysqli_query($conn, "SELECT * FROM tours");

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

   <div class="product-display" >
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Tour Location</th>
            <th>Tour Description</th>
            <th>Hotel Name</th>
            <th>Total Cost</th>
            <th> Image </th>
            <th>action</th>
         </tr>
         </thead>
         <?php while ($row = mysqli_fetch_assoc($select)) {?>
         <tr>

            <td><?php echo $row['tour_location']; ?></td>
            <td><?php echo $row['tour_description']; ?></td>
            <td><?php echo $row['hotel_name']; ?></td>
            <td><?php echo $row['total_cost']; ?>TK</td>
            <td><img src="uploaded_img/<?php echo $row['location_image']; ?>" height="300" width="300" alt=""></td>
            <td>
               <a href="update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php }?>
      </table>
   </div>
</body>
</html>