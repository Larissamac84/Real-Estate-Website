<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Manage Property</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div id="container">
    <?php include("includes/header.html");?>
    <?php include("includes/nav.html");?>
    <main>
      <?php
        // This file handles the form submission for editing an existing property.
        // It retrieves the updated property details from the form (address, town, county, price, etc.),
        // connects to the database, and performs an SQL UPDATE query to modify the corresponding property
        // record in the "property" table. If the update is successful, it redirects to the manage properties page, and if not, it displays an error message.

        require 'connect.php';

        if (isset($_POST['submit'])) {
            // Retrieve the property ID from the form
            $propertyId = $_POST['propertyid'];

            // Retrieve and sanitize the updated values from the form
            $address1 = mysqli_real_escape_string($link, $_POST['address1']);
            $town = mysqli_real_escape_string($link, $_POST['town']);
            $county = mysqli_real_escape_string($link, $_POST['county']);
            $price = mysqli_real_escape_string($link, $_POST['price']);
            $bedrooms = $_POST['bedrooms'];
            $shortdescription = mysqli_real_escape_string($link, $_POST['shortdescription']);
            $longdescription = mysqli_real_escape_string($link, $_POST['longdescription']);
            $image = mysqli_real_escape_string($link, $_POST['image']);
            $categoryid = $_POST['categoryid'];
            $vendor_email = $_POST['vendor_email'];

            // Update the property record in the database
            $sql_update = "UPDATE property SET address1='$address1', town='$town', county='$county', price='$price', bedrooms='$bedrooms', shortdescription='$shortdescription', longdescription='$longdescription', image='$image', categoryid='$categoryid', vendor_email='$vendor_email' WHERE propertyid='$propertyId'";

            if (mysqli_query($link, $sql_update)) {
                echo "<h3>Property Updated!</h3>";
                echo "<a href='manageproperty.php'>Return to Manage Properties page</a>";
            } else {
                echo "An error occurred, try again!";
            }
        }

        mysqli_close($link);
      ?>
    </main>
    <?php include("includes/footer.html");?>
  </div>
</body>
</html>
