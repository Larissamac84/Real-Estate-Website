<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Display All prop cards</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>
<div id="container">
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
<main>
<div id="displayproperties">
<?php
require "connect.php"; // Access the connection code

$sql = "SELECT * FROM property";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) { // Check if there are records in the result set
  echo "<h3>All Properties</h3>";
  echo "<div class='card-area'>"; // Set up the flex container

  while ($row = mysqli_fetch_array($result)) { // While there are records...
    $propertyid = $row["propertyid"];
    $image = $row["image"];
    $property = $row["address1"];
    $propertydesc = $row["shortdescription"];
    $price = $row["price"];

    echo "<div class='card'>"; // Create a card - each card is a child of the card-area flex container
    echo "<div class='image-holder'>"; // The image-holder is a div in the card to hold the image
    echo "<img src='$image' alt='property'>";
    echo "</div>"; // Close the image holder
    echo "<div class='cardcontainer'>"; // This container div adds a horizontal rule and holds the property name, description, and price
    echo "<hr>";
    echo "<h4>$property</h4>"; // Output the property name
    echo "<p>&euro; $price</p>"; // Output the euro sign and price
    echo "<p>$propertydesc</p>"; // Output the property description
    echo "<div class='moredetails'>"; // This div contains the more details button
    echo "<p><a href='moredetails.php?propertyid=$propertyid'>Details</a></p>";
    echo "</div>"; // Close the more details div
    echo "</div>"; // Close the cardcontainer div
    echo "</div>"; // Close the card

  } // End while loop

  echo "</div>"; // Close the flex container since no more records
} else { // If there are no records in the result set
  echo "<h3>There are no properties in the database</h3>"; // Output a message
}

mysqli_close($link); // Close the connection
?>
</div> <!-- Close the displayproperties div-->
</main><!-- Close the main element-->

<?php include("includes/footer.html");?>
</div><!-- Close the container div-->
</body>
</html>
