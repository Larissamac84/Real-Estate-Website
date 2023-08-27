<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Manage Comments</title>
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
$server="localhost"; 
$dbuser="root"; 
$password="";
$link=mysqli_connect($server,$dbuser,$password); 
mysqli_select_db($link, "property");

$sql="SELECT * from comment"; 
$result=mysqli_query($link, $sql); 

echo "<table>"; 
echo "<tr> 
	<th> Title</th> 
	<th>Content</th> 
	<th>Author</th> 
	<th>Created</th> 
	<th>Status</th> 
	<th>Update</th>
	<th>Delete</th>
	
	</tr>"; 
while($row=mysqli_fetch_array($result)) {
	$id=$row["id"];
	$title=$row["title"]; 
	$content=$row["content"]; 
	$author=$row["author_name"]; 
	$created=$row["created_at"]; 
	$status=$row["status"]; 
	
echo "<tr> 
	<td>$title</td> 
	<td>$content</td> 
	<td>$author</td> 
	<td>$created</td> 
	<td>$status</td>
	
	<td><a href='updatecomment.php?id=$id' onclick=\"return confirm('Are you sure you want to 
	approve this comment?');\">Approve</a></td>
	
	<td><a href='deletecomment.php?id=$id' onclick=\"return confirm('Are you sure you want to 
	delete this comment?');\">Delete</a></td>
	


	
	</tr>"; 
} 
echo "</table>"; 
mysqli_close($link);
?>

</main>

<?php include("includes/footer.html");?>
</div>
</body>
</html>
