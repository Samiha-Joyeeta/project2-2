 
<?php



   session_start();

   $mail = $_SESSION['email'];




$servername = "localhost";
$username = "root";
$password = "01673";
$dbname = "sale";



// Create connection
$con = new mysqli($servername, $username, $password, $dbname);



// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 








  $delete_id= $_GET['del'];
 
  $deletion = mysqli_query($con,"delete from rentlist where property_id = '$delete_id' AND email='$mail'"); // delete query
  


if($deletion)
{
    mysqli_close($con);
   
    header("location:cart.php"); // redirects to all records page
    exit;	
}
else
{
	echo "<script>alert('Error deleting record')</script>";
             header("location:cart.php");
    }

  
     





          ?>
  