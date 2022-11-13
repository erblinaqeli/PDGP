<?php

	include("kontrollo.php");	
	
?>
<html>
	<head>
		<!-- <title>Moduli Administratorit</title> -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
<body>
		<?php

include_once("konfigurimi.php");

if(isset($_POST['addclass'])) {	
	$name = $_POST['name'];
	$description = $_POST['description'];
	$course_id= $_POST['course_id'];
	
	
	if(empty($name)) {
				
		
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	}
	    else { 
		 
			
			
		$rezultati = mysqli_query($lidh, "INSERT INTO `class_list`(`id`, `user_id`, `course_id`, `name`, `description`,`date_created`) VALUES ('','$kyc_perd','$course_id','$name','$description',NOW())");
		
		
			echo "<script>
         setTimeout(function(){
            window.location.href = 'Klasa.php';
         }, 500);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 2 sekonda. <b></p>";
		 
	}
}
?>
</body>
</html>