<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
    include("kontrollo.php");   
?>
<?php

require_once('konfigurimi.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `question_paper_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
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
            <h1 style="text-align: center; padding: 2%">Shto Provim</h1>
       
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
              <form enctype="multipart/form-data"  action="addpaper.php" method="post" name="form1"  >
                <div class="card-body">
                   <div class="form-group">
                  <label>Lenda-Klasa</label>
                  <select name="class_id" id="class_id" class="form-control select2" required>
        <option value="" disabled <?= !isset($class_id) ? 'selected' : "" ?>></option>
        <?php 
        $class = $lidh->query("SELECT c.*,concat(cc.name,' - ', c.name) as `class` FROM `class_list` c inner join course_list cc on c.course_id = cc.id where c.user_id = '$kyc_perd'  ".(isset($class_id) ? " or c.id = '{$class_id}'" : "")."  order by cc.`name` asc,c.`name` asc");
        while($row = $class->fetch_assoc()):
        ?>
          <option value="<?= $row['id'] ?>" <?php echo isset($class_id) && $class_id == $row['id'] ? 'selected' : '' ?>><?= $row['class'] ?></option>
        <?php endwhile; ?>
      </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Emri</label>
                    <input type="text" class="form-control" name="title" placeholder=""  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Instruksion</label>
                    <input type="text" class="form-control" name="description" placeholder=""  >
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button  type="submit"style="background-color: #001f42;
    border-color: #001f42;"   name="addpaper" class="btn btn-primary">Shto</button>
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
