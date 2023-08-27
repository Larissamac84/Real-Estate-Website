<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>My first HTML5 page</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>
<div id="container">
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
<!--LARISSA main tag was missing-->
<main>
<h3>Add a Product</h3>
<p>
  <div id="addproduct">
    <form method="post" action="processadd.php">
      <table>
        <tr>
          <td>Product Name: </td>
          <td><input type="text" name="productname" placeholder="Enter product name" required="required"/></td>
        </tr>
        <tr>
          <td>Price: </td>
          <td><input type="text" name="price" placeholder="Enter product price" required="required" /></td>
        </tr>
        <tr>
          <td>Description: </td>
          <td><textarea name="description" rows="8" cols="35" placeholder="Enter product short description" required="required" /></textarea></td>
        </tr>
        <tr>
          <td>Long Description: </td>
          <td><textarea name="longdescription" rows="8" cols="35" placeholder="Enter product long description" required="required"/></textarea></td>
        </tr>
        <tr>
          <td>Vendor Email: </td>
          <td>
            <!--create a select box with dropdown email options taken from the database as this is more user friendly-->
            <select name="vendor_email" required="required">
              <option>Select Vendor</option>
              <!-- PHP code to connect to the database and retrieve email options -->

<!-- LARISSA your php code for the dropdown was down below the form - 
needs to be in the select vendor select box so I moved it up - maybe pasted it in the wrong place-->

<?php

// LARISSA the connection code was missing

 require 'connect.php';
  // Retrieve vendor email options from the 'vendor' table
  $sql="SELECT vendor_email FROM vendor";
  $result=mysqli_query($link, $sql); // Run the query

  // Output vendor email options as dropdown options
  if (mysqli_num_rows($result) > 0) {
    while ($row=mysqli_fetch_array($result)) {
      $vendor_email=$row['vendor_email'];
      echo "<option value='$vendor_email'>$vendor_email</option>";
    }
  }
?>
</select>
      
</td>
</tr>
<tr>
<td>Category ID: </td>
<td>
<!-- Create a select box with dropdown category options taken from the database as this is more user friendly -->
<select name="category" required="required">
<option>Select Category</option>
<?php
  // Retrieve category options from the 'category' table
  $sql = "SELECT * FROM category";
  $result = mysqli_query($link, $sql); // Run the query

  // Output category options as dropdown options
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $categoryname = $row['categoryname'];
      $categoryid = $row['categoryid'];
      echo "<option value='$categoryid'>$categoryname</option>";
    }
  }
  mysqli_close($link);
?>
</select>
</td><tr>
<td>Image Path: </td>
<td><input type="text" name="image" placeholder="Enter image path" required="required" /></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Add Product"/></td>
</tr>

</table>
</form>
  </div>
</p>


</main>


<?php include("includes/footer.html");?>
</div>
</body>
</html>