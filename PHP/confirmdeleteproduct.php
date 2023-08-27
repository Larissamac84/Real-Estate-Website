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

<!--LARISSA opening and closing main tags were missing-->

<main>
<?php
require 'connect.php';
$productid = $_GET['productid'];

$sql = "SELECT * FROM products WHERE productid = $productid";
$result = mysqli_query($link, $sql);

echo "<h3>Confirm Delete Product</h3>";
echo "<p>";
echo "<table>";
echo "<tr> 
<td><strong>Image</td> 
<td><strong>Product</td> 
<td><strong>Price</td> 
<td><strong>Description</td> 
</tr>";

$row = mysqli_fetch_array($result);
$image = $row["image"];
$product = $row["productname"];
$productdesc = $row["description"];
$price = $row["price"];

echo "<tr> 
<td><img src='$image' width=100 height=100> </td> 
<td>$product</td> <td>&euro; $price</td> <td>$productdesc</td> 
</tr>";
echo "</table>";

echo "<p> Are you sure you want to delete this product? <p> 
<a href='deleteproduct.php?productid=$productid'>Delete</a> 
<a href='manageproducts.php'>Cancel</a>";

mysqli_close($link);
?>
</main>

<?php include("includes/footer.html");?>
</div>
</body>
</html>


