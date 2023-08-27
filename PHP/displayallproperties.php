<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Display all properties</title>
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
        <div id="displayproperties"> 
          <?php 
          $server="localhost"; 
          $dbuser="root"; 
          $password="";
          $link=mysqli_connect($server,$dbuser,$password); 
          mysqli_select_db($link, "property");

          $sql="SELECT * from property"; 
          $result=mysqli_query($link, $sql);

          if (mysqli_num_rows($result) > 0) {
            echo "<table>"; 
            echo "<tr> 
              <td><strong>Image</td> 
              <td><strong>Property</td> 
              <td><strong>Price</td> 
              <td><strong>Description</td> 
              <td><strong>Details</td> 
            </tr>"; 

            while ($row = mysqli_fetch_array($result)) {
              $propertyid = $row["propertyid"]; 
              $image = $row["image"]; 
              $property = $row["address1"]; 
              $propertydesc = $row["shortdescription"]; 
              $price = $row["price"]; 

              echo "<tr> 
                <td><img src='$image' width=100 height=100></td> 
                <td>$property</td> 
                <td>&euro; $price</td> 
                <td>$propertydesc</td> 
                <td><a href='moredetails.php?propertyid=$propertyid'>Details</a></td> 
              </tr>"; 
            } 

            echo "</table>"; 
          } else {
            echo "There are no properties in the database";
          }

          mysqli_close($link); 
          ?> 
        </div>
      </div>
    </div>
  </main>
  <?php include("includes/footer.html");?>
</body>
</html>
