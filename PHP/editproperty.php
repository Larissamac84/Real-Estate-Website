<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Edit Property</title>
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
require 'connect.php';

$propertyid = isset($_GET["propertyid"]) ? $_GET["propertyid"] : null;

$address1 = "";
$town = "";
$county = "";
$price = "";
$bedrooms = "";
$shortdesc = "";
$longdesc = "";

if ($propertyid) {
  $sql = "SELECT * FROM property WHERE propertyid = $propertyid";
  $result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    $propertyid = $row["propertyid"];
    $address1 = $row["address1"];
    $town = $row["town"];
    $county = $row["county"];
    $price = $row["price"];
    $bedrooms = $row["bedrooms"];
    $shortdesc = $row["shortdescription"];
    $longdesc = $row["longdescription"];
    $image = $row["image"];
    $categoryid = $row["categoryid"];
    $vendor_email = $row["vendor_email"];
}
}
?>


<!-- Write out the existing fields into the form fields -->
<form method="post" action="processedit.php">
  <input type="hidden" name="propertyid" value="<?php echo $propertyid; ?>"/>
  <table>
<tr>
  <td><?php if (!empty($image)) { echo "<img src='$image' width='100' height='100'>"; } ?></td>
</tr>

    <tr>
      <td>Address:</td>
      <td><input type="text" name="address1" value="<?php echo $address1; ?>"/></td>
    </tr>
    <tr>
      <td>Town:</td>
      <td><input type="text" name="town" value="<?php echo $town; ?>"/></td>
    </tr>
    <tr>
      <td>County:</td>
      <td><input type="text" name="county" value="<?php echo $county; ?>"/></td>
    </tr>
    <tr>
      <td>Price:</td>
      <td><input type="text" name="price" value="<?php echo $price; ?>" /></td>
    </tr>
    <tr>
      <td>Bedrooms:</td>
      <td><input type="text" name="bedrooms" value="<?php echo $bedrooms; ?>" /></td>
    </tr>
    <tr>
      <td>Short Description:</td>
      <td><textarea name="shortdescription" rows="8" cols="35"><?php echo $shortdesc; ?></textarea></td>
    </tr>
    <tr>
<tr>
  <td>Long Description:</td>
  <td><textarea name="longdescription" rows="8" cols="35"><?php echo $longdesc; ?></textarea></td>
</tr>
<tr>
  <td>Vendor Email:</td>
  <td>
    <select name="vendor_email" required="required">
      <?php echo "<option value='$vendor_email'>$vendor_email</option>"; // Display the current value at the top
      $sql = "SELECT DISTINCT vendor_email FROM property WHERE vendor_email != '$vendor_email'"; // Retrieve other possible vendor emails
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $vendor_email = $row['vendor_email'];
          echo "<option value='$vendor_email'>$vendor_email</option>";
        }
      }
      ?>
    </select>
  </td>
</tr>
<tr>
  <td>Category:</td>
  <td>
    <select name="categoryid" required="required">
      <?php echo "<option value='$categoryid'>$categoryid</option>"; // Display the current value at the top
      $sql = "SELECT DISTINCT categoryid FROM property WHERE categoryid != $categoryid"; // Retrieve other possible category IDs
      $result = mysqli_query($link, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $other_categoryid = $row['categoryid'];
          echo "<option value='$other_categoryid'>$other_categoryid</option>";
        }
      }
      ?>
    </select>
  </td>
</tr>
<tr>
  <td>Image path:</td>
  <td><input type="text" name="image" value="<?php echo $image; ?>"/></td>
</tr>
<tr>
  <td><input type="submit" name="submit" value="Update Property" class="s-button"/>
  </td>
</tr>
</table>
</form>

</main> 

<?php
mysqli_close($link);

include("includes/footer.html");
?>
</div>
</body>
</html>
