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
    <?php include("includes/header.html");?>
    <?php include("includes/nav.html");?>

    <main>
      <h2>Welcome to the Real Estate Website</h2>
      <p>Experience the diverse range and quality of our real estate portfolio, 
      Explore our Residential properties, 
      where comfort and style combine to offer an amazing designed homes . Browse our Sites section,and discover our 
      properties, ideal for launching and expanding your business ventures. </p>

      <h3>Last 3 Properties added !</h3>
      <div class="card-area">
        <?php
        require "connect.php"; // Access the connection code

        $sql = "SELECT * FROM property ORDER BY propertyid DESC LIMIT 3";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
            $propertyid = $row["propertyid"];
            $image = $row["image"];
            $property = $row["address1"];
            $propertydesc = $row["shortdescription"];
            $price = $row["price"];

            echo "<div class='card'>";
            echo "<div class='image-holder'>";
            echo "<img src='$image' alt='property'>";
            echo "</div>";
            echo "<div class='cardcontainer'>";
            echo "<hr>";
            echo "<h4>$property</h4>";
            echo "<p>&euro; $price</p>";
            echo "<p>$propertydesc</p>";
            echo "<div class='moredetails'>";
            echo "<p><a href='moredetails.php?propertyid=$propertyid'>Details</a></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
        } else {
          echo "<p>No properties found.</p>";
        }

        mysqli_close($link);
        ?>
      </div>
    </main>

    <?php include("includes/footer.html");?>
  </div>
  
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>

</body>
</html>
