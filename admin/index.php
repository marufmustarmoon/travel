<?php

@include '../main/dbconnect.php';

@include 'header.php';


if (isset($_POST['add_tour'])) {
    
    $tour_loaction = $_POST['tour_loaction'];
    $tour_description = $_POST['tour_description'];
    $hotel_name = $_POST['hotel_name'];
    $Total_cost = $_POST['Total_cost'];
    $location_image = $_FILES['location_image']['name'];
    $location_image_tmp_name = $_FILES['location_image']['tmp_name'];
    $tour_image_folder = 'uploaded_img/' . $location_image;

    if (empty($tour_loaction) || empty($tour_description) || empty($hotel_name) || empty($Total_cost) || empty($location_image)) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO `tours`(`tour_location`, `tour_description`, `hotel_name`, `total_cost`, `location_image`) VALUES ('$tour_loaction','$tour_description','$hotel_name','$Total_cost','$location_image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($location_image_tmp_name, $tour_image_folder);
            $message[] = 'new tour added successfully';
            header('location:index.php');

        } else {
            $message[] = 'could not add the tour';
        }
    }

}
;

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM tours WHERE id = $id");
    header('location:index.php');
}
;

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

<?php

if (isset($message)) {
    foreach ($message as $message) {
        echo '<span class="message">' . $message . '</span>';
    }
}

?>

<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" >
         <h3>add a new tour</h3>
         <input type="text" placeholder="enter Tour Location" name="tour_loaction" class="box">
         <input type="text" placeholder="enter Tour description" name="tour_description" class="box">
         <input type="text" placeholder="Hotel Name" name="hotel_name" class="box">
         <input type="number" placeholder="Total Cost" name="Total_cost" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="location_image" class="box">
         <input type="submit" class="btn" name="add_tour" value="add tour">
      </form>

   </div>

  

</div>

<?php

@include 'tour_list.php';

?>


</body>
</html>