<?php


@include '../main/dbconnect.php';

@include 'header.php';

$select = mysqli_query($conn, "SELECT * FROM booking");

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
            <th>Tour ID</th>
            <th>Booked By</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Member</th>
            <th>Location</th>
            
         </tr>
         </thead>
         <?php while ($row = mysqli_fetch_assoc($select)) {?>
         <tr>

            <td><?php echo $row['tour_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['p_number']; ?></td>
            <td><?php echo $row['member']; ?></td>
            <td><?php echo $row['location']; ?></td>
            
            
         </tr>
      <?php }?>
      </table>
   </div>
</body>
</html>