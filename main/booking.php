<?php

@include 'dbconnect.php';
@include 'session.php';
@include 'header.php';



if (isset($_POST['book'])) {
    

   
    $tour_id = $_POST['tour_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $p_number= $_POST['p_number'];
    $member = $_POST['member'];
    $location = $_POST['location'];

    if (empty($tour_id) ||empty($name) || empty($email) || empty($p_number) || empty($member) || empty($location)) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO `booking`(`tour_id`, `name`, `email`, `p_number`, `member`, `location`) VALUES ('$tour_id','$name',' $email','$p_number','$member','$location')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
          
          $message[] = 'new tour booked successfully';
      } else {
          $message[] = 'could not book the tour';
      }
        
    }

}

;?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="sign_log/src/design.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
  
<?php

if (isset($message)) {
    foreach ($message as $message) {
        echo '<span class="message">' . $message . '</span>';
    }
}

?>

  <div class="container" style=" margin-top: 5rem;">
    <div class="admin-product-form-container"  >
      <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class ="moon" enctype="multipart/form-data" >

          <input type="number"   name="tour_id" placeholder="Tour Id" class="box">
          <input type="text"   name="name" placeholder="Name" class="box">
          <input type="text"  name="email" placeholder="Email" class="box">
          <input type="number"   name="p_number" placeholder="Phone Number" class="box">
          <input type="number"  name="member" placeholder="Total Member" class="box" >
          <input type="text" name="location" placeholder="Location"  class="box" >
          <button type="submit" class="bttn" name="book">Book Now</button>
      </form>
     </div>
   </div>
  


    
    
    
   
 

</body>
</html>