<?php

	include("kontrollo.php");	
     $id = $_REQUEST['id'];
	
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

if(isset($_POST['addquestion'])) {	
	$question = $_POST['question'];
	$level = $_POST['level'];
	$points = $_POST['points'];
		

	$question_paper_id=$id;

	
	
	if(empty($question)) {
				
		
		echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
	}
	    else { 
		 
			
			
		$rezultati = mysqli_query($lidh, "INSERT INTO `question_list`(`idpytja`, `question_paper_id`, `question`, `type`, `level`, `points`) VALUES ('','$question_paper_id','$question','1','$level','$points')");
		
		
			echo "<script>
         setTimeout(function(){
            window.location.href = 'view_paper.php?id=$id.php';
         }, 50);
      </script>";
		 echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 2 sekonda. <b></p>";
		 
	}
}
?>
</body>
</html>