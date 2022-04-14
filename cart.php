<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "01673";
$cartdbname = "cart";


// Create connection
$conn = new mysqli($servername, $username, $password, $cartdbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



require_once ("CreateDb.php");
require_once ("component.php");

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


if (isset($_POST['checkout']))
{


if (isset($_SESSION['email']))
{
   echo "<script>window.location = 'customer-info.php'</script>";

   if (isset($_SESSION['cart'])){

                      
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    
                                     
                                            
                                            $pname=$row['product_name'];
                                             $pid=$row['id'];
                                              $pimage=$row['product_image'];
                                               $price=$row['product_price'];
                                               $mail=$_SESSION['email'];


                                      $sql = "INSERT INTO cart_table(email, pid, pname, pimage, price)
VALUES ('$mail', '$pid', '$pname', '$pimage', '$price')";
mysqli_query($conn,$sql);
 
  





                                    }
                                   
                                }
                            }
                        
                    }
}


else 
{
           echo "<script>alert('You have to login first to confirm your order!')</script>";
           echo "<script>window.location = 'loginpage.php'</script>";
}
}








?>























<!DOCTYPE HTML>
<html>
<head>
<title>search and order</title>
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
      <li><a href="about.php">About</a></li>
      <li><a href="hideout.php">Contact Info</a></li>
      <li><a href="restaurants.php">View Restaurants</a></li>
        <li><a href="hideout-menu.php">Food Menu</a></li>
     
      <li class="push">
        <?php if(isset($_SESSION['email']))
        {
          ?> <a href="logout.php">Sign-out</a>
        <?php } else {
          ?> 
        <a href="loginpage.php">Sign-in</a>

      <?php } ?></li>


        
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

    <div class="container-sm cart-page">
          
          
                        <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){

                      
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                      $total = $total + (int)$row['product_price'];


                                      





                                    }
                                   
                                }
                            }
                        
                    }else{
                        echo "<h5> Cart is Empty </h5>";
                    }


                    $_SESSION['due'] = $total;


                ?>
                    
             
             
        
            
             

            
            
           </div>
             

         <div class="container-sm cart-page"> 
       <div class="col-4  border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>BDT <?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>BDT <?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
       
       <br>

      <div class="container">
        <div class="row">
          <div class="col-12">
            <form action="cart.php" method="post">
     <button type="submit" class="btn btn-warning mx-2 text-center" name="checkout">Proceed To Checkout</button>
           </form>
          

     
 </div>
</div>
</div>



 <section class="footer">
    <div class="container">
      <div class="row">
        <div class="lol col-md-6 text-left">
          <h3>About Us</h3>
          <p class="line">Hide-out Cafe is a fast food restaurant with good quality food, good ambiance & good service.</p><p class="line"> In hac habitasse platea dictumst. Morbi ut maximus velit, eget rhoncus urna. Mauris quis placerat felis. Suspendisse eu faucibus diam. Praesent nec felis vitae nunc commodo mollis. Mauris efficitur tortor elit, at condimentum neque dignissim vel. </p>

          <h3>Contact Us</h3>
          <p><i class="fa fa-phone" aria-hidden="true"></i>  017873246 </p>
          <p><i class="fa fa-envelope"></i>            yourhideout@gmail.com </p>


        </div>
        <div class="lol col-md-3 text-left">
          <h3>Our Policies</h3>
          <p>No return policy</p>
                    <p>Order cancellation is not allowed once ordered</p>
                    <p>No Discounts</p>


        </div>
        <div class="lol col-md-3  text-left">
          <h3 class="cafe">The Hideout Cafe</h3>
          <img src="Hideout\logoH.png" class="logo2" alt="Food">


        </div>
        
      </div>

      
      

  </section>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>



</body>
</html>