<?php
    session_start();

    //Email of The Seller

    if(isset($_SESSION['email']))
    {
    	$email = $_SESSION['email'];
    	$username = $_SESSION['username'];
        echo $ce;
        echo $username;
        
    }

    //Upload Image and others

  

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: seller.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'realEstate/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database

				$name = $_POST["name"];  
$email = $_POST["email"];       
$address =$_POST["address"];
$price =$_POST["price"];
				$sql = "INSERT INTO products(`product_name`, `product_price`, `product_image`) 
				        VALUES('$address','$price','$new_img_name')";
				mysqli_query($conn, $sql);
				header("Location: sale-menu.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: seller.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: seller.php?error=$em");
	}

}else {
	header("Location: seller.php");
}

    //database Connection

    $sname = "localhost";
$uname = "root";
$password = "01673";
$dbname = "sale";
$tablename = "upload";

$conn = mysqli_connect($sname, $uname, $password, $dbname);

if (!$conn) {
	echo "Connection failed!";
	exit();
}
    

?>









<!DOCTYPE html>
<html>
<head>
	<title>Selling/Rental Information</title>
	<style>
		body {
			margin-left: 10%;
			margin-right: 10%;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
	</style>
</head>
<body>
	<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     <form action="seller.php"
           method="post"
           enctype="multipart/form-data">

           <input type="file" 
                  name="my_image"><br>



                  <label for="name"> Customer Name: </label>
       <input type="text" name="name" value="<?php 
       if(isset($_SESSION['username']))
    { echo $_SESSION['username'];}
    ?>" readonly autofocus> <br>

     <label for="address"> Email-ID: </label><br>
       <input type="email" id="email" name="email" value="<?php  if(isset($_SESSION['username']))
    { echo $_SESSION['email'];}
    ?>" size="20" required><br>

     <label for="address"> Customer Address: </label>
      <input type="text" name="address"  placeholder="Area,House No,Road,City" size="250" class="form-control mb-3 p-4" required>
       <label for="price"> Property Price/ Rent </label>
      <input type="price" name="price" size="250" required><br>

     <label for="info"> What do you want to do with the property? </label>
      <input list="info" name="info" required><br>
      <datalist id="info">
          <option value="For sale"></option>
               <option value="To give rent"></option>                         
                         </datalist><br>

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form>
</body>
</html>