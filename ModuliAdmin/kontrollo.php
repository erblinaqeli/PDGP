<?php
/* Kontrollon sesionin */
include('konfigurimi.php');
session_start();
$kon_perd=$_SESSION['username'];
$ses_sql = mysqli_query($lidh,"SELECT * FROM users_adm
 WHERE username='$kon_perd' ");
$rresht=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$kyc_perd=$rresht['id'];
$perd_name=$rresht['firstname'];
$perd_sur=$rresht['lastname'];



if(!isset($kon_perd))
{

} ?>