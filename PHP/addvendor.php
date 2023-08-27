<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div id="container">
    <?php include("includes/header.html");?>
    <?php include("includes/nav.html");?>

    <main>

      
	  
<div id="addvendor"> 
<h3>Add a Vendor</h3> 
<p> 

<form method="post" action="processvendor.php" id="vendorform"> 
<label>Email </label> 
<input type="email" name="vendor_email"required="required"><br> 
<label>Name: </label> 
<input type="text" name="vendor_firstname"required="required"><br> 
<label>Surname:</label> 
<input type="text" name="vendor_surname"required="required"><br> 
<label>Phone: </label> 
<input type="text" name="vendor_phone"required="required"><br> 

<input type="submit" name="submit" value="Add Vendor" class="add-button">

</form> 

</div>



    </main>

    <?php include("includes/footer.html");?>
  </div>
  
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>

</body>
</html>
