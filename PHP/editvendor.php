<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Edit Vendor</title>
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

  $vendor_email = isset($_GET["vendor_email"]) ? $_GET["vendor_email"] : null;

  $vendor_firstname = "";
  $vendor_surname = "";
  $vendor_phone = "";

  if ($vendor_email) {
    $sql = "SELECT * FROM vendor WHERE vendor_email = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $vendor_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      $vendor_firstname = $row["vendor_firstname"];
      $vendor_surname = $row["vendor_surname"];
      $vendor_phone = $row["vendor_phone"];
    }
    mysqli_stmt_close($stmt);
  }
  ?>

  <!-- Write out the existing fields into the form fields -->
  <form method="post" action="editconfvendor.php">
    <input type="hidden" name="vendor_email" value="<?php echo $vendor_email; ?>"/>
    <table>
      <tr>
        <td>First Name:</td>
        <td><input type="text" name="vendor_firstname" value="<?php echo $vendor_firstname; ?>"/></td>
      </tr>
      <tr>
        <td>Surname:</td>
        <td><input type="text" name="vendor_surname" value="<?php echo $vendor_surname; ?>"/></td>
      </tr>
      <tr>
        <td>Phone:</td>
        <td><input type="text" name="vendor_phone" value="<?php echo $vendor_phone; ?>"/></td>
      </tr>
      <tr>
         </table>
      <p><input type="submit" name="submit" value="Update Vendor" class="update-button"></p>

      </tr>
 
  </form>
 </main>
  <?php include("includes/footer.html");?>
</div>
</body>
</html>
