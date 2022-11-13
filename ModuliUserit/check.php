<?php
/* Kontrollon sesionin */
include('config.php');
session_start();
$user_check=$_SESSION['email'];
$ses_sql = mysqli_query($conn,"SELECT email FROM registered_user_list WHERE email ='user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$row['email'];
if(!isset($user_check))
{ header("Location: index.php");} 
?>
