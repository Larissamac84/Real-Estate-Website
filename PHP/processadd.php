<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>ProcessAdd</title>
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
      // This file is responsible for processing the form submission for adding a new property.
      // It includes header, navigation, and footer files for the page layout.
      // It retrieves the property details from the form (property name, price, description, etc.),
      // connects to the database, and inserts the data into the "properties" table. If the insertion is successful,
      // it displays a success message with a link to manage the properties, and if not, it shows an error message.

      require 'connect.php';

      if (isset($_POST['submit'])) {
        $address1 = mysqli_real_escape_string($link, $_POST['address1']);
        $town = mysqli_real_escape_string($link, $_POST['town']);
        $county = mysqli_real_escape_string($link, $_POST['county']);
        $price = mysqli_real_escape_string($link, $_POST['price']);
        $bedrooms = $_POST['bedrooms'];
        $shortdescription = mysqli_real_escape_string($link, $_POST['shortdescription']);
        $longdescription = mysqli_real_escape_string($link, $_POST['longdescription']);
        $image = mysqli_real_escape_string($link, $_POST['image']);
        $categoryid = $_POST['category'];
        $vendor_email = $_POST['vendor_email'];

        $sql_insert = "INSERT INTO property (address1, town, county, price, bedrooms, shortdescription, longdescription, image, categoryid, vendor_email) VALUES ('$address1', '$town', '$county', '$price', '$bedrooms', '$shortdescription', '$longdescription', '$image', '$categoryid', '$vendor_email')";

        if (mysqli_query($link, $sql_insert)) {
          echo "<h3>Property Added!</h3>";
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
