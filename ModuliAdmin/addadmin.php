
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

if(isset($_POST['addadmin'])) { 
  $firstname1= $_POST['firstname'];
  $lastname1= $_POST['lastname'];
  
  $username1= $_POST['username'];
  $foto =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
  $emrifotos = $_FILES['userfile']['name'];
  $password1= $_POST['password'];

  
  
  if(empty($firstname1)) {
        
    
    echo "<br/><a href='javascript:self.history.back();'>Kthehu</a>";
  }
      else { 
     
      
      
    $rezultati = mysqli_query($lidh, "INSERT INTO `users_adm`(`id`, `firstname`, `lastname`, `username`, `password`, `foto`, `emrifotos`) VALUES ('','$firstname1','$lastname1','$username1','$password1','$foto','$emrifotos')");
    
    
      echo "<script>
         setTimeout(function(){
            window.location.href = 'admusers.php';
         }, 500);
      </script>";
     echo"<p><b>   E dhena eshte duke u regjistruar ne sistem. Ju lutem pritni 2 sekonda. <b></p>";
     
  }
}
?>
</body>
</html>