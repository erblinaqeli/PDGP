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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PGP</title>

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

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">Platforma për Gjenerimin e Provimeve </a>
       
      </li></ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #001f42">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PGP</span>
    </a>

    <!-- Sidebar -->
  <?php include_once("menyuser.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
            
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

            <div class="card-body">
              <br>
          <br>
          <h3 class="card-title">&nbsp Lista e Provimeve</h3>
          <br><br>
        <div class="container-fluid">
      <table class="table table-hover table-striped table-bordered" id="list">
        <colgroup>
          <col width="10%">
          <col width="25%">
          <col width="20%">
          <col width="35%">
          <col width="10%">
          <col width="15%">
        </colgroup>
        <thead>
          <tr>
            <th>#</th>
            <th>Data Krijuar</th>
            <th>Lënda/Klasa</th>
            <th>Titulli</th>
            
            <th>Veprimet</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
            $qry = $lidh->query("SELECT q.*,CONCAT(cc.name,' - ',c.name) as `class` from `question_paper_list` q inner join class_list c on q.class_id = c.id inner join course_list cc on c.course_id = cc.id  order by CONCAT(cc.name,' - ',c.name) asc, q.`title` asc ");
            while($row = $qry->fetch_assoc()):
          ?>
            <tr>
              <td class="text-center"><?php echo $i++; ?></td>
              <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
              <td><?php echo $row['class'] ?></td>
              <td ><p class="m-0 truncate-1"><?= $row['title'] ?></p></td>
           
              <td align="center">
                 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              Veprimet
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <?php echo "<a class='dropdown-item view_data'href=\"view_paper.php?id=$row[id]\"><span class='fa fa-eye text-dark'></span>Shiko</a> ";   ?> 
                          <?php echo "<a class='dropdown-item edit_data'href=\"update_paper.php?id=$row[id]\"><span class='fa fa-edit text-primary'></span>Modifiko</a> ";   ?>  
                            
                           
                           
                            <?php echo "<a class='dropdown-item edit_data' href=\"delete_paper.php?id=$row[id]\"  onClick=\"return confirm('A jeni të sigurt se dëshironi të fshini provimin?')\" ><span class='fa fa-trash text-danger'></span> Fshij</a> ";   ?>   
                          </div>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
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

