<?php
/* Kontrollon sesionin */
include('konfigurimi.php');
session_start();
$kon_perd=$_SESSION['email'];
$ses_sql = mysqli_query($lidh,"SELECT firstname, lastname,email,id FROM registered_user_list
 WHERE email='$kon_perd' ");
$rresht=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$kyc_perd=$rresht['id'];
$perd_name=$rresht['firstname'];
$perd_sur=$rresht['lastname'];



if(!isset($kon_perd))
{

} ?>