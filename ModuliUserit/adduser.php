
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

if(isset($_POST['adduser'])) { 
  $firstname1= $_POST['firstname'];
  $lastname1= $_POST['lastname'];
  $gender1 =$_POST['gender'];
  $dob1=$_POST['dob'];
  $email1= $_POST['email'];
  $foto =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
  $emrifotos = $_FILES['userfile']['name'];
  $password1= $_POST['password'];

  
  
  if(empty($email1)) {
        
    
    echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
  }
      else { 
     
      
      
    $rezultati = mysqli_query($lidh, "INSERT INTO `registered_user_list`(`id`, `firstname`, `lastname`, `gender`, `dob`, `email`, `password`, `foto`, `emrifotos`) VALUES ('','$firstname1','$lastname1','$gender1','$dob1','$email1','$password1','$foto','$emrifotos')");
    
    
      echo "<script>
         setTimeout(function(){
            window.location.href = 'index.php';
         }, 500);
      </script>";
     echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 2 sekonda. <b></p>";
     
  }
}
?>
</body>
</html>