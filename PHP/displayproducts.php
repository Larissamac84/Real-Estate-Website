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
<div id="content">
<main>

<div id="displayproducts"> 
<?php require 'connect.php';

$categoryid= $_GET["categoryid"];

$sql="SELECT * from products, category WHERE products.categoryid=$categoryid AND 
category.categoryid=$categoryid"; 
$result=mysqli_query($link, $sql);

if(mysqli_num_rows($result)>0) { 
$output=mysqli_query($link, $sql); 
$getcategory=mysqli_fetch_array($output); 
echo "<h3>"; 
echo $getcategory["categoryname"]; 
echo "</h3>"; 
echo "<table>"; 
echo "<tr> 
	<td><strong>Image</td> 
	<td><strong>Product</td> 
	<td><strong>Price</td> 
	<td><strong>Description</td> 
	<td><strong>Details</td> 
</tr>"; 
while($row=mysqli_fetch_array($result)) { 
	$productid=$row["productid"]; 
	$image=$row["image"]; 
	$product=$row["productname"]; 
	$productdesc=$row["description"]; 
	$price=$row["price"]; 
echo "<tr>
	<td><img src='$image' width=100 height=100> </td> 
	<td>$product</td> <td>&euro; $price</td> 
	<td>$productdesc</td> 
	<td><a href='moredetails.php?productid=$productid'>Details</a></td> 
</tr>"; } 
echo "</table>"; } 
else { 
echo "<h3> There are currently no items in this category</h3>"; } 
mysqli_close($link); 
?> 
</div>




</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>
