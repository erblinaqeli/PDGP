<?php
/* Index.php faqja qe permban formen e loginit) */
  include('kycu.php'); // Include Login Script
  if ((isset($_SESSION['email']) != '')) 
  {
    header('Location: ballina.php');
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDGP</title>
   <link rel="icon" type="image/png" href="images/mobilelogo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
       <img src="images/logo.png" alt="" id="sys-logo" class="img-thumbnail img-circle rounded-circle border border-4" style="width:50%;
        height:50%">
      <div style="padding-top: 3%"><a href=""  class="h3"><b>Platforma Digjitale për Gjenerimin e Provimeve PDGP</b></a></div>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Kycuni për të filluar sesionin</p>

      <form method="post" action="">
        <div class="input-group mb-3">
          <input name="email" class="form-control" placeholder="Email"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password"class="form-control" placeholder="Password"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
             <a href="createuser.php">Krijo  llogari</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Kycu</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
