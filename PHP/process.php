<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Process</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>
<div id="container">
<?php 

//This file handles the processing of a form submission for adding a testimonial comment. 
//It connects to the MySQL database, retrieves the form data (title, content, author name, and email), 
//and inserts the data into the "comment" table. If the insertion is successful, it displays a success message, and if not, it displays an error message.

$server = "localhost"; 
$dbuser = "root"; 
$password = ""; 
$link = mysqli_connect($server, $dbuser, $password);
mysqli_select_db($link, "property"); 

$title = $_POST["title"]; 
$content = $_POST["content"]; 
$author_name = $_POST["author_name"]; 
$author_email = $_POST["author_email"]; 
$sql_insert = "INSERT INTO comment (title, content, author_name, author_email) VALUES 
('$title', '$content', '$author_name', '$author_email')"; 

if(mysqli_query($link, $sql_insert)) {
    echo "<h3>Testimonial Added!</h3>Thank you for your feedback. Our administrators moderate all comments and it will be attended to shortly<p>"; 
    echo "<a href='getcomments.php'>Return to Testimonials page</a>";
} 
else {
    echo "An error occurred, try again!"; 
} 
mysqli_close($link); 
?>

</div>
</body>
</html>
