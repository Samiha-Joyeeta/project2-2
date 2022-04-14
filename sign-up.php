

<?php

  session_start();



$servername = "localhost";
$username = "root";
$password = "01673";
$dbname = "signup";
$tablename = "regtable";



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
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             fname VARCHAR (100) NOT NULL,
                             lname VARCHAR (100) NOT NULL,
                             contact INT(20) NOT NULL,
                             email VARCHAR (25) NOT NULL,
                            password VARCHAR (260) NOT NULL
                             
                            );";

            if (!mysqli_query($conn, $sql)){
                echo "Error creating table : " . mysqli_error($conn);
            }

        }else{
            return false;
        }

        $conn->close();


$servername = "localhost";
$username = "root";
$password = "01673";
$dbname = "signup";
$tablename = "regtable";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$fnameErr = $lnameErr = $emailErr  =  $contactErr = $passErr = $emailErr2 = "";



if(isset($_POST['Login']))
    {

    



$fname = $_POST["fname"];  
$lname = $_POST["lname"];  
$email = $_POST["email"];       
$contact =$_POST["contact"];

$pass = md5($_POST["pass"]);




$emailquery = " select * from regtable where email = '$email' ";
$query = mysqli_query($conn,$emailquery);

$emailcount = mysqli_num_rows($query);

if($emailcount>0)
{

  echo "<script>alert('*This email already exists*')</script>";
              echo "<script>window.location = 'sign-up.php'</script>";


	
}

else{


$sql = "INSERT INTO regtable (fname, lname, email, contact, password)
VALUES ('$fname', '$lname', '$email', '$contact', '$pass')";
mysqli_query($conn,$sql);
 echo "<script>alert('Hurray!...You have successfully registered!')</script>";
              echo "<script>window.location = 'signin.php'</script>";
  

}



}




$conn->close();
?>





<!DOCTYPE html>
<html>
<head>
<title>Sign-up</title>

<style>
.error {color: #FF0000;}
</style>


<link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&family=Playball&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<link rel="stylesheet" type="text/css" href="signupstyle.css">


</head>


    <body>
    	
     <section class="login my-4 mx-5">
          <div class="container">
          <div class="row no-gutters">
          <div class="col-lg-5">

            <img src="simone-hutsch-_wpce-AsLxk-unsplash.jpg" class="img-fluid" alt="Problem Loading Image">

    </div>
    <div class="col-lg-7 px-5 pt-5">
      
     
      <h4 class="ml-3">Enter The Required Information</h4>

 <p class="ml-3 heaven">
      
<?php

  if(isset($_SESSION['message']))
  {

    echo $_SESSION['message']  ;
    unset($_SESSION['message'] );
  }

  ?>
        

    	
    	
    	
    
	<form method="post" action="sign-up.php"> 	
    <div class="form">
       <div class="col-lg-7">
	   <label for="fname"> Enter Your First Name: </label>
	 <input type="text" id="fname" placeholder="First Name" name="fname" size="25" class="form-control my-3 p-4" required>
   
   </div>
      </div>
      <div class="form">
       <div class="col-lg-7">
   <label for="lname"> Enter Your last Name: </label>
	 
	 <input type="text" id="lname" placeholder="Last Name" name="lname" maxlength="10" size="25" class="form-control my-3 p-4" required>  
	 
   
	  </div>
      </div>
      <div class="form">
       <div class="col-lg-7">
        <label for="contact"> Enter Your Contact Number: </label>
	  <input type="tel" name="contact" placeholder="Contact Number" class="form-control my-3 p-4" required>
   </div>
      </div>
      <div class="form">
       <div class="col-lg-7">
    
	   <label for="email"> Enter Email Address </label>
	  <input type="email" id="email" name="email" placeholder="E-mail ID" size="20" class="form-control my-3 p-4" required>
    
   
	 </div>
      </div>
      <div class="form">
       <div class="col-lg-7">
        <label for="pass"> Enter Password: </label>
	 <input type="password" id="pass" name="pass" placeholder="Password" class="form-control my-3 p-4" required>
   
     
     </div>
      </div>
      <div class="form">
       <div class="col-lg-7">
     
     
     

   
  <input type="submit" value="Register" name="Login" class="btn btn-primary btn-xl text-center mb-3">

  </div>
      </div>
      <div class="form">
   <div class="col-lg-7">
     <a href="#">Forgot Password?</a><br>

     <p>Already have an account?<a href="signin.php"> Sign In</a></p>
   </div>
    </div>

   </form>
  
   </div>
 </div>
</div>
  </section>
     





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>



</body>
</html>