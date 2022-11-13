<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
  include("kontrollo.php"); 
?>
<?php
//including the database connection file
include_once("konfigurimi.php");

//fetching data in descending order (lastest entry first)

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
   <link rel="icon" type="image/png" href="images/mobilelogo.png">

    <!-- ANDROID + CHROME + APPLE + WINDOWS APP -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="white">
    <link rel="apple-touch-icon" href="icon-512.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Calendar">
    <meta name="msapplication-TileImage" content="icon-512.png">
    <meta name="msapplication-TileColor" content="#ffffff">

    <!-- WEB APP MANIFEST -->
    <!-- https://web.dev/add-manifest/ -->
    <link rel="manifest" href="5-manifest.json">

    <!-- SERVICE WORKER -->
    <script>
    if ("serviceWorker" in navigator) {
      navigator.serviceWorker.register("5-worker.js");
    }
    </script>

    <!-- JS + CSS -->
    <script src="4b-calendar.js"></script>
    <link rel="stylesheet" href="4c-calendar.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PDGP</title>

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
            
        <h1 style="text-align: center; padding: 2%">Miresevini ne Platformen per Gjenerimin e Provime!</h1>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-dark" style="background-color: #001F42!important;color: #fff!important">
               
              <div class="inner">
                <h3 style="text-align: center;"><?php 
                    $course = $lidh->query("SELECT * FROM course_list where user_id = '$kyc_perd'")->num_rows;
                    echo $course;
                  ?></h3>

                <p style="text-align: center;">Totali i Lëndëve</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-cyan" style="background-color: #3a579b!important;color: #fff!important;">
              <div class="inner">
               <h3 style="text-align: center;"><?php 
                    $course = $lidh->query("SELECT * FROM class_list where user_id = '$kyc_perd'")->num_rows;
                    echo $course;
                  ?></h3>

                <p style="text-align: center;">Totali i Klasave</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-warning" style="background-color: #17a2b8!important;color: #fff!important;">
              <div class="inner">
               <h3 style="text-align: center;"><?php 
                    $course = $lidh->query("SELECT * FROM question_paper_list where user_id = '$kyc_perd'")->num_rows;
                    echo $course;
                  ?></h3>

                <p style="text-align: center;">Totali i Provimeve</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          </div>
            <div class="card-body">
            </div>
        <div class="container-fluid">
     
    </div>
  </div>
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

