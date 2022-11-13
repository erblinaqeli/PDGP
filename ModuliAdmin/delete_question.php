<?php
//including the database connection file
include("konfigurimi.php");

//getting uid of the data from url
$idpytja = $_GET['idpytja'];

//deleting the row from table
$rezultati = mysqli_query($lidh,"DELETE FROM `question_list` WHERE idpytja=$idpytja");

//redirecting to the display page (index.php in our case)
header("Location:Provimi.php");
?>

