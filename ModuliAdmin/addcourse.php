<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
    include("kontrollo.php");   
?>
<html>
	<head>
     
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<style>
			form{
				margin: 0;
			}
            body{
                background-color: rgb(3,47,95);
            }
		</style>
	</head>
	<body class="is-preload">
        <?php
        //including the database connection file
        include_once("konfigurimi.php");
        if(isset($_POST['shtolende'])) {	
            $name = $_POST['name'];
            $description = $_POST['description'];
            $id1= $_POST['id'];

                
            // checking empty fields
            if(empty($name)) {			
                if(empty($name)) {echo "<font color='red'>name field is empty.</font><br/>";}
    

                //link to the previous password
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
            } else { 
                // if all the fields are filled (not empty) 
                //insert data to database	
                // INSERT INTO lendet (lenda) VALUES('$lenda')
                $result = mysqli_query($lidh, "INSERT INTO course_list (`id`, `user_id`, `name`, `description`, `delete_flag`, `status`, `date_created`, `date_updated`) VALUES('','$id1','$name','$description','','',NOW(),'')");
                //display success messpassword
            echo "<script>
                setTimeout(function(){
                    window.location.href = 'Lenda.php';
                }, 500);
            </script>";
                echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 5 sekonda. <b></p>";
            
                //echo "<font color='green'>Data added successfully.";
                //echo "<br/><a href='perdoruesit.php'>View Result</a>";
            }
        }
        ?>
</body>
</html>
