<!DOCTYPE html>
 <head>
   <title> Owner Information </title>

   <link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&family=Playball&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<link rel="stylesheet" type="text/css" href="upload.css">
</head>
<body>


     <section class="login my-4 mx-5">
          <div class="container">
          <div class="row no-gutters">
          <div class="col-lg-5">

            <img src="photos\red-house.jpg" class="img-fluid" alt="Problem Loading Image">

    </div>
    <div class="col-lg-7 px-5 pt-5">
      
     
      <h4 class="ml-3">Enter Required Information</h4>

 <p class="ml-3 heaven">


     <form method="post" action="upload.php" enctype="multipart/form-data">
    <div class="form">
       <div class="col-lg-7">
          <label for="name"> Owner's Name: </label>
       <input type="text" name="name" class="form-control my-3 p-4"> 
     </div>
      </div>
      <div class="form">
       <div class="col-lg-7">
          <label for="email"> Email-ID: </label><br>
       <input type="email" id="email" name="oemail" size="20" class="form-control my-3 p-4" required>
     </div>
      </div>
      <div class="form">
      <div class="col-lg-7">
          <label for="address"> Property Address: </label>
      <input type="text" name="address"  placeholder="Area,House No,Road,City" size="250" class="form-control mb-3 p-4" required>
    </div>
  </div>
  <div class="form">
      <div class="col-lg-7">
          <label for="phone"> Contact Number: </label>
      <input type="tel" name="phone"  size="100" class="form-control mb-3 p-4" required>
    </div>
  </div>
   
  <div class="form">
      <div class="col-lg-7">
         <label for="price"> Property Price/ Rent </label>
      <input type="price" name="price" size="25" required>
    </div>
  </div>

  <div class="form">
      <div class="col-lg-7">
        <label for="image"> Insert Image </label>
        <input type="file" name="my_image">
    </div>
  </div>
  <div class="form">
      <div class="col-lg-7">
          <label for="info"> What do you want to do with the property? </label>
      <input list="info" name="info" required><br>
      <datalist id="info">
          <option value="For sale"></option>
               <option value="To give rent"></option>                         
                         </datalist>
    </div>
  </div>

   <div class="form">
     <div class="col-lg-7">
      <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-xl text-center mb-3"><br>
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