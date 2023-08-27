<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Admin - Login</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>
<div id="container">
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>

<?php
if (empty($_SESSION)) {
    session_start();
}

if (isset($_SESSION['errors'])) {
    echo "<div class='form-errors'>";
    foreach ($_SESSION['errors'] as $error) {
        echo "<p>";
        echo $error;
        echo "</p>";
    }
    echo "</div>";
}

unset($_SESSION['errors']);
?>
 <main>
<h3>Login</h3>
<form action="login_action.php" method="POST">
    <p>
        <label>Email: </label>
        <input type="email" name="admin_email" placeholder="Enter username">
    </p>
    <p>
        <label>Password: </label>
        <input type="password" name="password" placeholder="Enter password">
    </p>
    <p>
        <input type="submit" value="Login" class="update-button">
    </p>
</form>
</main>

<?php include("includes/footer.html"); ?>

</div>
</body>
</html>



