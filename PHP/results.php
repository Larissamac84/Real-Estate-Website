<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div id="container">
    <?php include("includes/header.html"); ?>
    <?php include("includes/nav.html"); ?>
    
    <main>
      <div id="content">
        <?php
        require 'connect.php';

        if (isset($_POST['submit'])) {
          $town = $_POST['location'];
          $categoryid = $_POST['category'];
          $minprice = $_POST['minprice'];
          $maxprice = $_POST['maxprice'];

          $sql = "SELECT * FROM property WHERE property.town='$town' AND property.categoryid='$categoryid' AND property.price>='$minprice' AND property.price<='$maxprice'";
          $result = mysqli_query($link, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<h3>Search Results</h3>";
            echo "<table>
                  <tr>
                    <td><strong>Image</strong></td>
                    <td><strong>Property</strong></td>
                    <td><strong>Price</strong></td>
                    <td><strong>Description</strong></td>
                    <td><strong>Details</strong></td>
                  </tr>";

            while ($row = mysqli_fetch_array($result)) {
              $propertyid = $row["propertyid"];
              $image = $row["image"];
              $address = $row["address1"];
              $shortdesc = $row["shortdescription"];
              $price = $row["price"];

              echo "<tr>
                      <td><img src='$image' width='100' height='100'></td>
                      <td>$address</td>
                      <td>&euro;$price</td>
                      <td>$shortdesc</td>
                      <td><a href='moredetails.php?propertyid=$propertyid'>Details</a></td>
                    </tr>";
            }

            echo "</table>";
          } else {
            echo "<h3>No results found.</h3>";
          }
        }

        mysqli_close($link);
        ?>
      </div>
    </main>
    
    <?php include("includes/footer.html"); ?>
  </div>
</body>
</html>
