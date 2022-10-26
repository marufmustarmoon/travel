<?php
include('dbconnect.php');


if (isset($_POST['input'])) {
    
    $input = $_POST['input'];
    $sql = "SELECT * FROM `tours` WHERE `tour_location` LIKE '{$input}%'";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

     



    

   
        if ($count > 0) {

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
                
                
                <div class="row mb-5">
                    <div class="col-md-8 col-xl-6 text-center mx-auto mt-3 pb-3">
                        <h2>Tours</h2>
                    </div>
                </div>
                <div class="col">
                    <div class="card "style="width:fit-content; margin-top:2erm;"><img class="card-img-top w-100 " style="height: 200px;"  src="./admin/uploaded_img/<?php echo $row['location_image']; ?>">
                        <div class="card-body p-4">
                            <p class="text-primary card-text mb-0">Location: <?php echo $row["tour_location"]; ?></p>
                            <h4 class="card-title">Tour id: <?php echo $row["id"]; ?></h4>
                            <p class="card-text">Description:<?php echo $row["tour_description"]; ?></p>
                            <p class="card-text">Hotel Name:<?php echo $row["hotel_name"]; ?></p>
                            <p class="card-text">Total Cost:<?php echo $row["total_cost"]; ?></p>
                    
                            <?php
                            // Start the session and get the data

                            if (isset($_SESSION['name'])) {
                                
                            ?>
                            <?php
                                
                        
                                echo '<div class="d-flex"><a href="booking.php" class="btn btn-primary" type="button" style="border-radius: 20px;width: 115px;height: 40px;">Book Now</a></div>';
                            } else {
                                echo '<div class="d-flex"><a href="sign_log\index.php" class="btn btn-primary" type="button" style="border-radius: 20px;width: 215px;height: 40px;">Register To Book</a></div>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
        <?php
            }
            
        } else {
            echo "<p>No matches found</p>";
        }
        
  

}
?>