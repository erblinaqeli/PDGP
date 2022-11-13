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

if(isset($_POST['addpaper'])) {	
	$title1 = $_POST['title'];
	$description = $_POST['description'];
	$class_id= $_POST['class_id'];
	
	
	if(empty($title1)) {
				
		
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	}
	    else { 
		 
			
			
		$rezultati = mysqli_query($lidh, "INSERT INTO `question_paper_list`(`id`, `user_id`, `class_id`, `title`, `description`, `delete_flag`, `status`, `date_created`, `date_updated`) VALUES ('','$kyc_perd','$class_id','$title1','$description','','',NOW(),'')");
		
		
			echo "<script>
         setTimeout(function(){
            window.location.href = 'Provimi.php';
         }, 500);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 2 sekonda. <b></p>";
		 
	}
}
?>
</body>
</html>