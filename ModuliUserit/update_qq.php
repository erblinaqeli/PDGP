<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
    include("kontrollo.php");  

?>
<?php
// including the database lidhection file
include_once("konfigurimi.php");

    if(isset($_POST['updatequestion']))
    { 
      $idpytja =$_POST['idpytja'];
      $question=$_POST['question'];
      $level=$_POST['level'];


      $points =$_POST['points'];    
     
       
        //updating the table
        $rezultati = mysqli_query($lidh,"UPDATE question_list SET question='$question', level='$level', points='$points' WHERE idpytja=$idpytja");
        
        //redirectig to the display message. In our case, it is ballina.php
        header("Location: view_paper.php?id=$id.php");
      }
    
    ?>
    <?php
    //getting ID_Pacienti  from url
    $idpytja= $_GET['idpytja'];

    //selecting data associated with this particular ID_Pacienti 
    $rezultati = mysqli_query($lidh,"SELECT * FROM question_list WHERE idpytja=$idpytja");

    while($res = mysqli_fetch_array($rezultati))
    {
      $question=$res['question'];
      $level=$res['level'];
      $points=$res['points'];
      
      
    }
    ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PDGP</title>
   <link rel="icon" type="image/png" href="images/mobilelogo.png">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

     <style>
  .user-img{
        position: absolute;
        height: 27px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
  }
  .btn-rounded{
        border-radius: 50px;
  }</style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    <?php include_once("nav.php"); ?>
  <!-- /.navbar -->

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php include_once("shkurtesa.php"); ?>
  

    <!-- Sidebar -->
  <?php include_once("menyuser.php"); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
            <h1 style="text-align: center; padding: 2%">Modifiko Detajet e Klasës</h1>
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content"  style="padding-right:20%; padding-left: 20%">
      <div class="container-fluid">
           <div class="card card-primary">
             <div class="card-header" style=" background-color: #001f42!important;">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  action="update_qq.php" method="post" name="form1" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pyetja</label>
                    <input type="text" class="form-control" name="question" placeholder="" value='<?php echo $question;?>' >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Pikët</label>
                    <input type="text" class="form-control" name="points" placeholder="" value='<?php echo $points;?>' >
                  </div>
                 
                 
                </div>
                <div class="form-group" style="padding: 4%">
                  <label for="level" class="control-label">Zgjedheni nivelin e vështirësisë</label>
               <select id="level" class="form-control"name="level">
                 <option value="$level">Zgjedh Nivelin</option>
                 <option value="1" >Të Lehtë</option>
                 <option value="2" >Të Mesëm</option>
                 <option value="3" >Të Vështirë</option>
               </select>
                </div>
                
                 
                </div>
               
                <!-- /.card-body -->
<input type="hidden" name="idpytja" value='<?php echo $_GET['idpytja'];?>' />

                  
                  <button  type="submit"style="background-color: #001f42;
    border-color: #001f42;"   name="updatequestion" class="btn btn-primary">Modifiko</button>
                </div>
              </form>
            </div>
            </div>
          </div>
          <!-- ./col -->
         
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
   <?php include_once("footer.php"); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
