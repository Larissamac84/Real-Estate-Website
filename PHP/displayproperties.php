<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Display properties</title>
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
      <div id="displayproperties">
        <?php
        require 'connect.php';

        if (isset($_GET["categoryid"])) {
          $categoryid = $_GET["categoryid"];

          $sql = "SELECT * FROM property
                  WHERE categoryid = $categoryid";

          $result = mysqli_query($link, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<h3>Properties in Category: $categoryid</h3>";
            echo "<table>";
            echo "<tr>
                    <td><strong>Image</strong></td>
                    <td><strong>Property</strong></td>
                    <td><strong>Price</strong></td>
                    <td><strong>Description</strong></td>
                    <td><strong>Details</strong></td>
                  </tr>";
            while ($row = mysqli_fetch_array($result)) {
              $id = $row["propertyid"];
              $image = $row["image"];
              $property = $row["address1"];
              $description = $row["shortdescription"];
              $price = $row["price"];
              echo "<tr>
                      <td><img src='$image' width='100' height='100'></td>
                      <td>$property</td>
                      <td>$price</td>
                      <td>$description</td>
                      <td><a href='moredetails.php?propertyid=$id'>Details</a></td>

                    </tr>";
            }
            echo "</table>";
          } else {
            echo "<h3>There are currently no properties in this category</h3>";
          }
          mysqli_close($link);
        } else {
          echo "<h3>No category ID specified.</h3>";
        }
        ?>
      </div>
    </main>
    <?php include("includes/footer.html");?>
  </div>
</div>
</body>
</html>
