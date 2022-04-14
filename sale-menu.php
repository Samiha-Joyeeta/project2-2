<?php

session_start();

require_once ('CreateDb11.php');
require_once ('component11.php');


// create instance of Createdb class
$database = new CreateDb("sale", "saleProperties");

//wishlist database

$servername = "localhost";
$username = "root";
$password = "01673";
$dbname = "sale";
$tb = "salelist";



      // create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($conn, $sql)){

            $conn = new mysqli($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tb
                            (email VARCHAR (25) NOT NULL,
                            property_id INT(250) NOT NULL,
                             property_name VARCHAR (100) NOT NULL,
                             property_price FLOAT,
                             property_image VARCHAR (100)
                            );";

            if (!mysqli_query($conn, $sql)){
                echo "Error creating table : " . mysqli_error($conn);
            }

        }else{
            return false;
        }

        

        //End of wishlist database

//cart

if (isset($_POST['add'])){
    print_r($_POST['property_id']);
     print_r($_POST['property_name']);
    if(isset($_SESSION['email']))

   {

    if(isset($_SESSION['cart1'])){

        $item_array_id = array_column($_SESSION['cart1'], "property_id");

        if(in_array($_POST['property_id'], $item_array_id)){

            echo "<script>alert('Product is already added in your wishlist...!')</script>";
            echo "<script>window.location = 'sale-menu.php'</script>";
        }else{

            


            $count = count($_SESSION['cart1']);
            $item_array = array(
                'property_id' => $_POST['property_id']

            );

            $_SESSION['cart1'][$count] = $item_array;

            $email = $_SESSION['email'];
            $pid = $_POST['property_id'];
             $pname = $_POST['property_name'];
              $pimg = $_POST['property_image'];
              $pprice= $_POST['property_price'];

               //$conn = new mysqli($servername, $username, $password, $dbname);
           
$sql = "INSERT INTO salelist (email, property_id, property_name, property_price, property_image)
VALUES ('$email', '$pid', '$pname', '$pprice', '$pimg')";
mysqli_query($conn,$sql);

if (!mysqli_query($conn, $sql)){
                echo "Error inserting into wishlist  : " . mysqli_error($conn);
            }





        }


    }else{

        $item_array = array(
                'property_id' => $_POST['property_id']
        );

        // Create new session variable
        $_SESSION['cart1'][0] = $item_array;
        print_r($_SESSION['cart1']);
    }
}
 


else{

	echo "<script>alert('Login first to order from this website')</script>";
              

             echo "<script>window.location = 'signin.php'</script>";
}
}




?>

















<!DOCTYPE HTML>
<html>
<head>
<title>Sale Options</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



 <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="menustyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">


</head>
<body>

	
	<nav class="zone header sticky">

		
		
			
        <div class="top-bar">
		<ul class="list1">
			<li><a href="homepage.php">Home</a></li>
			<li><a href="#">Contact Info</a></li>
						
			<li>

                <?php if(isset($_SESSION['email']))
                {
                    ?> <a href="sign-out.php">Sign-out</a>
                <?php } else {
                    ?> 
                <a href="signin.php">Sign-in</a>

            <?php } ?>



                </li>
			<li class="push cart"><a href="cart.php"><i class="fa-regular fa-heart"></i> Wishlist  


				<?php

                        if (isset($_SESSION['cart1'])){
                            $count = count($_SESSION['cart1']);
                            echo "<span id=\"cart_count\" class=\"text-warning\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning\">0</span>";
                        }

                        ?>
                    </a></li>
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

	<div class="container">
		<div class="row">


			  <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['property_name'], $row['property_price'], $row['property_image'], $row['property_id']);
                }
            ?>



		</div>
	</div>



	
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
					<h3>Our Policy</h3>
					<br>
					
                    <p>No Return Policy</p>
                    <p>No Discount Coupons</p>
                    <p>No Cancellation once order is confirmed</p>


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


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/8d375e9fb3.js" crossorigin="anonymous"></script>



	</body>
</HTML>
