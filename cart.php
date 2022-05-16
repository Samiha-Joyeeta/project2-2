<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "01673";
$dbname = "sale";

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
<title>Wishlist</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="cart.css"> 


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


 


</head>
<body>

  
  <nav class="zone header sticky">

        
        
            
        <div class="top-bar">
        <ul class="list1">
            <li><a style="color:white" href="homepage.php">Home</a></li>
            <li><a style="color:white" href="#">Contact Info</a></li>
                        
            <li>

                <?php if(isset($_SESSION['email']))
                {
                    ?> <a style="color:white" href="sign-out.php">Sign-out</a>
                <?php } else {
                    ?> 
                <a style="color:white" href="signin.php">Sign-in</a>

            <?php } ?>



                </li>
            
        </ul>
    </div>
    
    </nav>



<?php

  if(isset($_SESSION['message']))
  {

    echo $_SESSION['message']  ;
    unset($_SESSION['message'] );
  }

  ?>

  <br>

   <div class="container-fluid">
            <div class="row">
                <div class="col-12">
        <form action="cart.php" method="post">
             
        <table>
            <h3 class="text-center" style="color:hsla(31, 79%, 36%, 1);"> Sale-Properties</h3>
             <tr>
            <th> Property Image </th>
            <th> Property Owner </th>
            <th> Owner's Email </th>
            <th> Property Price </th>
            
            
           </tr>
           <?php 

              $view_email = $_SESSION['email'];

            $cart_details="SELECT DISTINCT email, property_id, property_name, property_price, property_image, owner_name,owner_email FROM salelist WHERE email = '$view_email'";
 
  $res = mysqli_query($conn,$cart_details); 
             

            
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
                     
                      $email=$row['email'];
              $pimg=$row['property_image'];
               $pname=$row['property_name'];
                $price=$row['property_price'];
                 $pid=$row['property_id'];
                 $oname = $row['owner_name'];
                 $oemail= $row['owner_email'];
                 




            ?>

            <tr>
            <td> 
                <div class="cart-info">
                    <img src="<?php echo $pimg; ?>" width="40%" height="250px" alt="Food">
                    
                    
                    <small style="margin-left:25px"> Location : <?php echo $pname; ?></small>
                    <a style="color:red; font-size:15px; margin-left:25px;" href="delete.php?del=<?php echo $pid;?>">Remove</a>
                </div>
                    
                </td>
            
            <td class="text-center" style="font-size:15px;"> <?php echo $oname; ?> </td>
            <td class="text-center" style="font-size:15px;"> <?php echo $oemail; ?> </td>
            <td class="text-center" style="font-size:15px;"> <?php echo '$'.$price.' M'; ?> </td>
            
            
           </tr>
           <br>

        <?php } 


        ?>

    </table>
    <table>

        <h3 class="text-center" style="color:hsla(31, 79%, 36%, 1);"> Rent-Properties</h3>

         <tr>
            <th> Property Image </th>
            <th> Property Owner </th>
            <th> Owner's Email </th>
            <th> Property Price </th>
            
            
           </tr>

        <?php 

              $view_email = $_SESSION['email'];

            $cart_details="SELECT DISTINCT email, property_id, property_name, property_price, property_image, owner_name,owner_email FROM rentlist WHERE email = '$view_email'";
 
  $res = mysqli_query($conn,$cart_details); 
             

            
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
                     
                      $email=$row['email'];
              $pimg=$row['property_image'];
               $pname=$row['property_name'];
                $price=$row['property_price'];
                 $pid=$row['property_id'];
                 $oname = $row['owner_name'];
                 $oemail= $row['owner_email'];
                 
                 




            ?>

            <tr>
            <td> 
                <div class="cart-info">
                    <img src="<?php echo $pimg; ?>" width="40%" height="250px" alt="Food">
                    
                    
                    <small style="margin-left:25px"> Location : <?php echo $pname; ?></small>
                    <a style="color:red; font-size:15px; margin-left:25px;" href="delete1.php?del=<?php echo $pid;?>">Remove</a>
                </div>
                    
                </td>
            
            <td class="text-center" style="font-size:15px;"> <?php echo $oname; ?> </td>
            <td class="text-center" style="font-size:15px;"> <?php echo $oemail; ?> </td>
            <td class="text-center" style="font-size:15px;"> <?php echo '$'.$price.' '; ?> </td>
            
            
           </tr>
           <br>

        <?php } 


        ?>


        </table>

          </form>
</div>
</div>
</div>
          
                    
             
             
        
            
             

            
            
           
             

     
       <br>

    


<section class="footer">
        <div class="container">
            <div class="row">
                <div class="lol col-md-6 text-left">
                    <h3>About Us</h3>
                    <br>
                    <p class="line">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p class="line"> In hac habitasse platea dictumst. Morbi ut maximus velit, eget rhoncus urna. Mauris quis placerat felis. Suspendisse eu faucibus diam. Praesent nec felis vitae nunc commodo mollis. Mauris efficitur tortor elit, at condimentum neque dignissim vel. </p>
                    <br>
                    


                </div>
                <div class="lol col-md-3 text-left">
                    <h3>Legal</h3>
                    <br>
                    
                    <p>Terms & Conditions</p>
                    <p>Privacy Policy</p>
                   


                </div>

                <div class="lol col-md-3 text-left">

                <h3>Contact Us</h3>
                    <br>
                    <p><i class="fa fa-phone" aria-hidden="true"></i>  +1631*** </p>
                    <p><i class="fas fa-envelope"></i>            agent.co.1919@gmail.com </p>
                </div>
                

            <hr>
            
        </div>
        

    </section>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>



</body>
</html>