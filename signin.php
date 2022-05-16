



<?php 

session_start();



$servername = "localhost";
$username = "root";
$password = "01673";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['Login']))
    {

           $email = $_POST['email'];
           $pass = md5($_POST['pass']);
  



           $query = "SELECT * FROM registertable WHERE email = '$email' AND password = '$pass'";

            $result=mysqli_query($conn,$query);

            if(mysqli_num_rows($result) == 1)
            {
              $row = mysqli_fetch_assoc($result);

              
                $_SESSION['username'] = $row['fname']." ".$row['lname'];
                $_SESSION['email'] = $row['email'];
              
              echo "<script>alert('You are logged in. Welcome to our webpage!!!')</script>";
              

             echo "<script>window.location = 'homepage.php'</script>";


            }

            else{
                    
                    
                    $mess = 'Email or password is incorrect';

            }
  }

  
   

    

?>




<!DOCTYPE html>
<html>
<head>
<title>Login</title>


<style>

  .heaven{

    color:red;
    
  }

</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<link rel="stylesheet" type="text/css" href="signin-style.css">


</head>

 <body>
  <section class="login my-5 mx-5">
          <div class="container">
          <div class="row no-gutters">
          <div class="col-lg-5">

            <img src="photos/graphics-01.svg" class="img-fluid" alt="Problem Loading Image">

    </div>
    <div class="col-lg-7 px-5 pt-5">
      
      <h1 class="font-weight-bold ml-3 py-3"><i class="fas fa-users"></i></h1>
      <h4 class="ml-3">Sign into your account</h4>

 <p class="ml-3 heaven">
      
<?php

 if(!empty($mess))

 
    {echo $mess;}
    ?>

    </p>
    <?php
  if(isset($_SESSION['message']))
  {

    echo $_SESSION['message']  ;
    unset($_SESSION['message'] );
  }

  ?>


                    



                    
    
    <form method="post" action="signin.php">
    <div class="form">
       <div class="col-lg-7">
       <input type="email" id="email" name="email" placeholder="E-mail ID" size="20" class="form-control my-3 p-4" required><br>
     </div>
      </div>
      <div class="form">
      <div class="col-lg-7">
      <input type="password" id="pass" name="pass" placeholder="Password" class="form-control mb-3 p-4" required><br>
    </div>
  </div>
  <div class="form">
     <div class="col-lg-7">
      <input type="submit" value="Sign-in" name="Login" class="btn btn-primary btn-xl text-center mb-3"><br>
      </div>
 </div>
 <div class="form">
   <div class="col-lg-7">
     <a href="#">Forgot Password?</a><br>

     <p>Don't have an account?<a href="sign-up.php"> Register here...</a></p>
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