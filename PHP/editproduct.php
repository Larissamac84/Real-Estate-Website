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

<?php
require 'connect.php';

//$productid = $_GET["productid"]; // Retrieve the productid passed in the URL

$productid = isset($_GET["productid"]) ? $_GET["productid"] : null;


//$sql = "SELECT * FROM products, category WHERE productid = $productid AND category.categoryid = products.categoryid";
$sql = "SELECT * FROM products, category WHERE productid = " . mysqli_real_escape_string($link, $productid) . " AND category.categoryid = products.categoryid";


$result = mysqli_query($link, $sql); // Run the query
$row = mysqli_fetch_array($result); // Store the recordset in $row

// Retrieve the database fields from the recordset and assign them to variables for output
$productid = $row["productid"];
$productname = $row["productname"];
$price = $row["price"];
$desc = $row["description"];
$longdesc = $row["longdescription"];
$vendor_email = $row["vendor_email"];
$categoryid = $row["categoryid"];
$categoryname = $row["categoryname"];
$image = $row["image"];
?>

<!-- Write out the existing fields into the form fields -->
<form method="post" action="processedit.php">
  <input type="hidden" name="productid" value="<?php echo $productid; ?>"/>
  <table>
    <tr>
      <td><?php echo "<img src='$image' width=100 height=100>"; ?></td>
    </tr>
    <tr>
      <td>Product Name:</td>
      <td><input type="text" name="productname" value="<?php echo $productname; ?>"/></td>
    </tr>
	<tr>
  <td>Price:</td>
  <td><input type="text" name="price" value="<?php echo $price; ?>" /></td>
</tr>
<tr>
  <td>Description:</td>
  <td><textarea name="description" rows="8" cols="35"><?php echo $desc; ?></textarea></td>
</tr>
<tr>
  <td>Further Details:</td>
  <td><textarea name="longdescription" rows="8" cols="35"><?php echo $longdesc; ?></textarea></td>
</tr>
<tr>
  <td>Vendor Email:</td>
  <td>
    <select name="vendor_email" required="required">
      <?php echo "<option value='$vendor_email'>$vendor_email</option>"; // Display the current value at the top
      $sql = "SELECT vendor_email FROM vendor WHERE vendor_email != '$vendor_email'"; // Choose all the other possible options from the database table
      $result = mysqli_query($link, $sql); // Run the query

      if (mysqli_num_rows($result) > 0) { // If records exist, output them as dropdown options
        while ($row = mysqli_fetch_array($result)) {
          $vendor_email = $row['vendor_email'];
          echo "<option value='$vendor_email'>$vendor_email</option>"; // Set the value of the option selected and show the user the possible email addresses
        }
      }
      ?>
    </select>
  </td>
</tr>
<!-LARISSA the tag for new row and new cell on lines 83 and 84 were missing-->
<tr>
<td>Category:</td>
<td>
  <!-- Create a select box with dropdown category options taken from the database as this is more user friendly -->
  <select name="category" required="required">
    <?php echo "<option value='$categoryid'>$categoryname</option>"; // Display the current value at the top
    $sql = "SELECT * FROM category WHERE categoryid != $categoryid"; // Choose all the other possible options from the database table
    $result = mysqli_query($link, $sql); // Run the query

    if (mysqli_num_rows($result) > 0) { // If records exist, output them as dropdown options
      while ($row = mysqli_fetch_array($result)) {
        $categoryname = $row['categoryname'];
        $categoryid = $row['categoryid'];
        echo "<option value='$categoryid'>$categoryname</option>"; // Set the value of the option selected to the categoryid but show the user the category name
      }
    }
    ?>
  </select>
</td>
</tr>
<tr>
  <td>Image path:</td>
  <td><input type="text" name="image" value="<?php echo $image; ?>"/></td>
</tr>
<tr>
  <td><input type="submit" name="submit" value="Update Product"/></td>
</tr>
</table>
</form>
<?php mysqli_close($link); ?>

<?php include("includes/footer.html");?>
</div>
</body>
</html>








