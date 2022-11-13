<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$id = $_GET['id'];

//deleting the row from table
$rezultati = mysqli_query($lidh,"DELETE FROM course_list WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:Lenda.php");
?>

