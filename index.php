<?php
include('main/session.php');
include('main/dbconnect.php');
include('main/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <style>
        h1{
        margin-top: 10rem;
       }
       

    </style>
</head>
<body>
    <div class="bg-image" style="
    background-image: url('main/bg.jpg');
    height: 600px;
  ">

        <div class="d-flex justify-content-center"><h1> Plan your next tour with us</h1> 
        
    </div>
    </div>
    <nav class="navbar navbar-light bg-light d-flex justify-content-center mt-2">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" id = "livesearch" placeholder="Search For Tours" aria-label="Search">
            
        </form>
        </nav>

    <div id="searchresult"> 
        
      
        <?php
        include('main/tours.php');
        ?>

    </div>


  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

$(document).ready(function(){

    $("#livesearch").keyup(function(){
        
        var input = $(this).val();
       
        if(input != ""){
            $.ajax({
                url:"main/livesearch.php",
                method:"POST",
                data:{input:input},

                success:function(data){
                    $("#searchresult").html(data);
                }
            });
           
        

        } 
        
          
      

});
    });







</script>
</body>
</html>

<?php
include('main/footer.php');
?>

