<?php

@include 'config.php';


$id = $_GET['edit'];

if(isset($_POST['update'])){

    $tour_loaction = $_POST['tour_loaction'];
    $tour_description = $_POST['tour_description'];
    $hotel_name = $_POST['hotel_name'];
    $Total_cost = $_POST['Total_cost'];
    $location_image = $_FILES['location_image']['name'];
    $location_image_tmp_name = $_FILES['location_image']['tmp_name'];
    $tour_image_folder = 'uploaded_img/' . $location_image;

    if (empty($tour_loaction) || empty($tour_description) || empty($hotel_name) || empty($Total_cost) || empty($location_image)) {
        $message[] = 'please fill out all';
   }else{

      $update_data = "UPDATE `tours` SET `tour_location`=' $tour_loaction',`tour_description`=' $tour_description ',`hotel_name`='  $hotel_name',`total_cost`=' $Total_cost ',`location_image`='$location_image' WHERE `id` = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($location_image_tmp_name, $tour_image_folder);
         header('location:index.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM `tours` WHERE `id` = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   
   <form action="" method="post" enctype="multipart/form-data" >
         <h3>Update a tour</h3>
         
         <input type="text" value="<?php echo $row['tour_location'];?>" name="tour_loaction" class="box">
         <input type="text" value="<?php echo $row['tour_description'];?>" name="tour_description" class="box">
         <input type="text" value="<?php echo $row['hotel_name'];?>" name="hotel_name" class="box">
         <input type="number" value="<?php echo $row['total_cost'];?>" name="Total_cost" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="location_image" class="box">
         <input type="submit" class="btn" name="update" value="update">
      </form>
   


   <?php }; ?>

   <?php ?>

   

</div>

</div>

</body>
</html>