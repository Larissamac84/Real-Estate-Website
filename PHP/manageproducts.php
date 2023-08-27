<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>My first HTML5 page</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>

<!--LARISSA main tag comes after the nav bar-->
<div id="container">
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
<main>
<a href="addproduct.php"> Add a new product</a>
<p>
<div id="displayproducts"> 

<?php 
$server="localhost"; 
$dbuser="root"; 
$password="";
$link=mysqli_connect($server,$dbuser,$password); 
mysqli_select_db($link, "giftcompany");

$sql="SELECT * from products"; 
$result=mysqli_query($link, $sql);

if (mysqli_num_rows($result)>0)
{

echo "<table>"; 
echo "<tr> 
<td><strong>Image</td> 
<td><strong>Product</td> 
<td><strong>Price</td> 
<td><strong>Description</td> 
<td><strong>Edit</td> 
<td><strong>Delete</td> 
</tr>"; 
while($row=mysqli_fetch_array($result)) {
$productid=$row["productid"]; 
$image=$row["image"]; 
$product=$row["productname"]; 
$productdesc=$row["description"]; 
$price=$row["price"]; 

echo "<tr> 
<td><img src='$image' width=100 height=100> </td> 
<td>$product</td> 
<td>&euro; $price</td> 
<td>$productdesc</td> 
<td><a href='editproduct.php?productid=$productid'>Edit</a></td> 
<td><a href='confirmdeleteproduct.php?productid=$productid'>Delete</a></td> 

</tr>"; 
} 
echo "</table>"; 
}
else
{
echo "There are no products in the database";
}

mysqli_close($link); 
?> 
</div>
</main>
<?php include("includes/footer.html");?>
</div>
</body>
</html>
