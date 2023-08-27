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
<main>

<div id="displayproducts">
<?php
require 'connect.php';

$categoryid= $_GET["categoryid"]; //parameter is passed in the url and accessed using GET

$sql="SELECT * from products, category WHERE products.categoryid=$categoryid AND
category.categoryid=$categoryid"; //accessing records from both tables to identify the categoryname as well as the product records in that category
$result=mysqli_query($link, $sql);

if(mysqli_num_rows($result)>0)
{
$output=mysqli_query($link, $sql);
$getcategory=mysqli_fetch_array($output);
echo "<h3>";
echo $getcategory["categoryname"]; //output category name at the top of the page
echo "</h3>";

echo "<div class='card-area'>";//set up the flex container

while($row=mysqli_fetch_array($result)) {
$productid=$row["productid"];
$image=$row["image"];
$product=$row["productname"];
$productdesc=$row["description"];
$price=$row["price"];
echo "<div class='card'>"; //create a card - each card is a child of the card-area flex container
echo "<div class='image-holder'>"; //the image-holder is a div in the card to hold the image
echo "<img src='$image' alt='employee' >";
echo "</div>"; //close the image holder
echo "<div class='cardcontainer'>"; //this container div adds a horizontal rule and holds  the product name, description and price
echo "<hr>";
echo  "<h4>$product</h4>"; //output the product name
echo "<p>&euro; $price</p>"; //output the euro sign and price
echo "<p> $productdesc</p>"; //output the product description
echo "<div class='moredetails'>"; //this div contains the moredetails button
echo "<p><a href='moredetails.php?productid=$productid'>Details</a></p>";
echo "</div>"; //close the moredetails div
echo "</div>"; //close the cardcontainer div
echo "</div>"; //close the card

} //end while loop
echo "</div>"; //close the flex container since no more records
}
else //if there are no records in the result set
{
echo "<h3>There are no products in the database</h3>"; //output a message
}
mysqli_close($link); //close the connection
?>
</div><!-- close the displayproducts div--> 

</main><!--close the main element-->
<?php include("includes/footer.html");?>
</div><!--close the container-->
</body>
</html>
