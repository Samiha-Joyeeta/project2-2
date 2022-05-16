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


$table = $_POST['info'];
 print_r($table);

if($table === "For sale" )
{
  
   $tablename = "saleproperties" ;
}

else{

  $tablename = "renthouses" ;
}



if(isset($_SESSION['email']))
   {



if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
  

  echo "<pre>";
  print_r($_FILES['my_image']);
  echo "</pre>";

  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];

  if ($error === 0) {
    if ($img_size > 1000000000000000) {
      $em = "Sorry, your file is too large.";
        header("Location: info.php?error=$em");
    }else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png"); 

      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = 'uploads/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);



        
            
             $pname = $_POST['address'];
              
              $pprice= $_POST['price'];
              $oname= $_POST['name'];
              $oemail= $_POST['oemail'];
              $pimg = 'uploads/'.$new_img_name ;


               //$conn = new mysqli($servername, $username, $password, $dbname);
           
$sql = "INSERT INTO $tablename (property_name, property_price, property_image,owner_name,owner_email)
VALUES ('$pname', '$pprice', '$pimg','$oname','$oemail')";

    
        
        mysqli_query($conn, $sql);

        if($table === "For sale" )
{
  
   header("Location: sale-menu.php");
}

else{

  header("Location: rent-houses.php");
}

        
      }else {
        $em = "You can't upload files of this type";
            header("Location: info.php?error=$em");
      }
    }
  }else {
    $em = "unknown error occurred!";
    header("Location: info.php?error=$em");
  }

}else {
  header("Location: info.php");
}

}


else{
      header("Location: signin.php");
    }






?>





























 