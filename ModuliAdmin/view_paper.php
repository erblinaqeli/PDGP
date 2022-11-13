<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
  include("kontrollo.php"); 
?>
<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $lidh->query("SELECT q.*,CONCAT(cc.name,' - ',c.name) as `class` from `question_paper_list` q inner join class_list c on q.class_id = c.id inner join course_list cc on c.course_id = cc.id where q.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>

<?php
// including the database lidhection file
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
    <div class="content-header" style="padding: 5%;">
      <div class="container-fluid">
            <h1 style="text-align: center ;padding-bottom: 4%;"> Detajet e Provimit</h1>
       
      </div><!-- /.container-fluid -->
      <div class="card card-outline card-primary shadow rounded-0">
        <div class="card-header">
            <h5 class="card-title">Veprimet</h5>
            <div class="card-tools">
              <?php echo "<a style='display: inline'class='dropdown-item edit_data'href=\"update_paper.php?id=$_GET[id]\"><span class='fa fa-edit text-primary'></span> Modifiko</a> ";   ?>  
               <?php echo "<a style='display: inline' class='dropdown-item edit_data' href=\"delete_paper.php?id=$_GET[id]\"  onClick=\"return confirm('A jeni të sigurt se dëshironi të fshini provimin?')\" ><span class='fa fa-trash text-danger'></span> Fshij</a> ";   ?>  


                    <?php echo "<a style='display: inline'class='dropdown-item edit_data'href=\"add_question.php?id=$_GET[id]\"><span class='fa fa-plus' style='color: teal'></span> Shto pyetje</a> ";   ?>
                    <?php echo "<a style='display: inline'class='dropdown-item edit_data'href=\"generate.php?id=$_GET[id]\"><span class='fa fa-file-alt'></span> Gjenero Provim</a> ";?>
                </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div >
            <div class="info-box" style="padding-bottom: 5%;
    padding-top: 5%;">
              

              <div class="info-box-content">
                <span class="info-box-text">Lënda-Klasa</span>
                <span class="info-box-number"><?= isset($class) ? $class : "" ?></span>
              </div>
              <div class="info-box-content">
                <span class="info-box-text">Titulli</span>
                <span class="info-box-number"><?= isset($title) ? $title : "" ?></span>
              </div>
              <div class="info-box-content">
                <span class="info-box-text">Instruksione</span>
                <span class="info-box-number"><?= isset($description) ? $description : "" ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
      <div >
         
              <!-- /.card-header -->
              <!-- form start -->
             
            </div>
          
                <h5><b></b></h5>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-question-circle" style="color: #001f42"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Pyetje të Lehta</span>
                                <span class="info-box-number text-right">
                                <?php 
                                    $question = $lidh->query("SELECT * FROM question_list where question_paper_id = '{$id}' and `level` = 1 ")->num_rows;
                                    echo $question;
                                ?>
                                <?php ?>
                                </span>
                                <span class="w-100 text-center"><a href="manageq.php?id=<?=$id? $id : "" ?>&level=1" data="">Shiko pyetjet</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-gradient-warning elevation-1"><i style="color: #001f42"class="fas fa-question-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Pyetje Mesatare</span>
                               <span class="info-box-number text-right">
                                <?php 
                                    $question = $lidh->query("SELECT * FROM question_list where question_paper_id = '{$id}' and `level` = 2 ")->num_rows;
                                    echo $question;
                                ?>
                                <?php ?>
                                </span>
                                <span class="w-100 text-center"><a href="manageq.php?id=<?=$id? $id : "" ?>&level=2" data="">Shiko pyetjet</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-gradient-danger elevation-1"><i style="color: #001f42"class="fas fa-question-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Pyetje të Vështira</span>
                                <span class="info-box-number text-right">
                                <?php 
                                    $question = $lidh->query("SELECT * FROM question_list where question_paper_id = '{$id}' and `level` = 3 ")->num_rows;
                                    echo $question;
                                ?>
                                <?php ?>
                                </span>
                                <span class="w-100 text-center"><a href="manageq.php?id=<?=$id? $id : "" ?>&level=3" data="">Shiko pyetjet</a></span>
                            </div>
                        </div>
                    </div>
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
