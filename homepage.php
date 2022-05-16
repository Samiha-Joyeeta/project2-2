<?php



session_start();


$servername = "localhost";
$username = "root";
$password = "01673";
$dbname = "restaurants";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




?>

<!DOCTYPE HTML>
<html>
<head>
<title>homepage</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="homepage.css">


</head>
<body>
    
    <section>
    <nav class="zone header sticky">
        <ul class="list1">
            <li style="color:white"> <?php if(isset($_SESSION['email']))
                {
                     echo 'You are logged in as ' . $_SESSION['username'];
                } ?>
                  </li>
                  <li class="push" style="color:white"> <?php if(isset($_SESSION['email']))
                {
                    ?>
                    <a href="cart.php">Wishlist</a>
                    <?php
                     
                } ?>
                  </li>
            
                
            <li>

                <?php if(isset($_SESSION['email']))
                {
                    ?> <a href="sign-out.php">Sign-out</a>
                <?php } else {
                    ?> 
                <a href="signin.php">Sign-in</a>

            <?php } ?>



                </li>
        </ul>
    </nav>
    <div class="emp">
         
    <div class="contain zone"><img class="img-fluid cover" src="photos\img-02.jfif">
    <div class="centered"><h1 class="about text-uppercase text-center">ABOUT US</h1>
        <hr class="line">
            <p class="description">If you are looking for a quick, reliable media of buying, selling or renting property, you're definitely at the right place. We provide the best services for property management. You can sell your house directly or through an agent. You can also rent or buy home and appartments from this website.</p></div>
    </div>
    
    </div>
</section>

<div class="space">

    </div>

    
  <section class="grids">

           <div class="heading text-center"> 
            <h1> Make Your Choice </h1>
            <hr class="heading-hr">
           </div>

           <div class="part">
    <div class="container">

    <div class="row">
           
        <div class="col-md-4 box-zone">
              <img alt="image" class="images" src="photos\home-for-sale.jpg" width="250px" height="200px">
            <h2 class="text-center text-uppercase">Buy a house</h2>
                <p class="text-center">We have a list of a lot of properties with an immersive experience of photos and videos.</p>
                <a class="option" href="sale-menu.php"><button type="button" class="btn btn-outline-warning">See Options</button></a>
            
            
        </div>
   

         <div class="col-md-4 box-zone">
              <img alt="image" class="images" src="photos\house-rent.jpg" width="250px" height="200px">
            <h2 class="text-center text-uppercase">Rent a house</h2>
                <p class="text-center">We have a list of a lot of properties with an immersive experience of photos and videos.</p>
                <a class="option" href="rent-houses.php"><button type="button" class="btn btn-outline-warning">See Options</button></a>
            
            
        </div>

         <div class="col-md-4 box-zone">
              <img alt="image" class="images" src="photos\sell-a-house.jpg" width="250px" height="200px">
            <h2 class="text-center text-uppercase">Sell a house</h2>
                <p class="text-center">We have a list of a lot of properties with an immersive experience of photos and videos.</p>
                <a class="option" href="info.php"><button type="button" class="btn btn-outline-warning">See Options</button></a>
            
            
        </div>
        
      
    
       
            </div>

       




</div>
</div>




</section>












</body>
</html>
