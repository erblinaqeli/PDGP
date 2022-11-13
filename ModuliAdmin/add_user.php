<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
    include("kontrollo.php");   
?>
<?php
//including the database connection file
include_once("konfigurimi.php");

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
            <h1 style="text-align: center; padding: 2%">Shto Profesor</h1>
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content"  style="padding-right:20%; padding-left: 20%">
    <div class="content"  style="padding-right:20%; padding-left: 20%; padding-bottom: 5%;">
     
           <div class="card card-primary">
              <div class="card-header" style=" background-color: #001f42!important;">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  action="adduser.php" method="post" name="form1"  >
                <div class="card-body">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Emri</label>
                    <input type="text" class="form-control" name="firstname" placeholder=""  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mbiermri</label>
                    <input type="text" class="form-control" name="lastname" placeholder=""  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gjinia</label>
                    <input type="text" class="form-control" name="gender" placeholder=""  >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Data lindjes</label>
                    <input type="date" class="form-control" name="dob" placeholder=""  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Emaila</label>
                    <input type="email" class="form-control" name="email" placeholder=""  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input name="userfile" type="file" />
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Fjalëkalimi</label>
                    <input type="password" class="form-control" name="password" placeholder=""  >
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button style="background-color: #001f42;
    border-color: #001f42;" type="submit"  name="adduser" class="btn btn-primary">Shto</button>
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
