<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>More Details</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<main>
  <div id="container">
    <?php include("includes/header.html");?>
    <?php include("includes/nav.html");?>
    <div id="content">

    <?php 
    $server = "localhost"; 
    $dbuser = "root"; 
    $password = ""; 
    $link = mysqli_connect($server, $dbuser, $password); 
    mysqli_select_db($link, "property"); 

    $propertyid = $_GET["propertyid"];

      $sql = "SELECT * FROM property WHERE propertyid = $propertyid"; 
      $result = mysqli_query($link, $sql); 
      $row = mysqli_fetch_array($result);
      
      $address1 = $row["address1"];
      $property = $row["shortdescription"]; 
      $price = $row["price"]; 
      $shortdescription = $row["shortdescription"]; 
      $longdescription = $row["longdescription"]; 
      $image = $row["image"];

      echo "<h2>$property</h2> <br> 
            <img src='$image' width='200' height='200' border='3px'> <h3>"; 
      echo "Property Description"; 
      echo "</h3> $shortdescription; <br> <h3>";
      echo "Property Details"; 
      echo "</h3> $longdescription; <h3>"; 
      echo "Price"; 
      echo "</h3> &euro; $price"; 

      mysqli_close($link);

    ?> 

    <p> 
     <button class="update-button-goback" onclick="goBack()">Go Back to Property Listing</button>

      
      <script> 
        function goBack() { 
          window.history.back(); 
        } 
      </script> 
    </p>

    </div>
    <?php include("includes/footer.html");?>
  </div>
</body>
</html>
