<?php
/* Kontrollon nese logini mund te kryhet me sukses, nese 
username dhe passwordi qe ka shkruar useri ne Index.php 
gjindet ne db ne MySQL */
	session_start();
	include("konfigurimi.php"); //Mundeson lidhjen me databazen e krijuar
	$gabim = ""; //Variabel për ruajtjen e gabimeve tona.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["email"]) || empty($_POST["password"]))
		{
			$gabim = "Kerkohet mbushja e te gjitha fushave!.";
		}else
		{
			// Definimi i $username dhe $password
			$p_email=$_POST['email'];
			$password=$_POST['password'];
			//Kontrollo username dhe password prej database
			$sql="SELECT id FROM registered_user_list WHERE 
			email='$p_email'
			and password='$password'";
			$rezultati=mysqli_query($lidh,$sql);
			$rresht=mysqli_fetch_array($rezultati,MYSQLI_ASSOC);
			/*Nese username dhe password ekzistojne ne databaze, atehere 
			krijo nje sesion. Perndryshe shfaq nje (echo) gabim.*/
			if(mysqli_num_rows($rezultati) == 1)
			{
				$_SESSION['email'] = $p_email; // Fillimi i sesionit
				header("location: ballina.php"); // hapet faqja pas logimit me sukses
			}else
			{
				$gabim = "Emri Perdoruesit ose Fjalekalimi gabim.";
			}
		}
	}
?>