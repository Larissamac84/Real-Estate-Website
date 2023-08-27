<?php
require 'connect.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $sql = "DELETE FROM comment WHERE id = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id); // Assuming the "id" column is of integer type
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: http://localhost/property/managecomments.php");
        exit;
    } else {
        echo "The record could not be deleted";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "No comment ID provided";
}

mysqli_close($link);
?>
