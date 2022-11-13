<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
  include("kontrollo.php"); 
   $id = $_REQUEST['id'];
   $level = $_REQUEST['level'];
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
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">Platforma për Gjenerimin e Provimeve </a>
       
      </li></ul>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

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
        <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Pyetja</th>
                    <th>Niveli</th>
                    <th>Pikët </th>
                    <th>Veprimet </th>
                  </tr>
                  </thead>
                   <tbody>
          <?php 
          $i = 1;
            $qry = $lidh->query("SELECT * from `question_list` where question_paper_id = '$id' and `level` = '{$level}' ");
            while($row = $qry->fetch_assoc()):
          ?>
            <tr>
              <td class="text-center"><?php echo $i++; ?></td>
              <td><?php echo $row['question'] ?></td>
              <td ><p class="m-0 truncate-1"><?= $row['level'] ?></p></td>
              <td ><p class="m-0 truncate-1"><?= $row['points'] ?></p></td>

              
              <td align="center">
                 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              Veprimet
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                        
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      <div class="container-fluid">
     
            <div class="card-body">
               <div class="card">
              <div class="card-header">
                <h3 class="card-title">Simple Full Width Table</h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Question</th>
                    </tr>
                  </thead>
                  <tbody>
          <?php 
          $i = 1;
            $qry = $lidh->query("SELECT * from `question_list` where question_paper_id = '$id' and `level` = '{$level}' ");
            while($row = $qry->fetch_assoc()):
          ?>
            <tr>
              <td class="text-center"><?php echo $i++; ?></td>
              <td><?php echo $row['question'] ?></td>
              <td ><p class="m-0 truncate-1"><?= $row['level'] ?></p></td>
              <td ><p class="m-0 truncate-1"><?= $row['points'] ?></p></td>

              
              <td align="center">
                 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              Veprimet
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                          <?php echo "<a class='dropdown-item edit_data'href=\"update_course.php?id=$row[id]\"><span class='fa fa-edit text-primary'></span>Modifiko</a> ";   ?>  
                            
                           
                           
                            <?php echo "<a class='dropdown-item edit_data' href=\"delete_course.php?id=$row[id]\"  onClick=\"return confirm('A jeni të sigurt se dëshironi të fshini lëndën?')\" ><span class='fa fa-trash text-danger'></span> Fshij</a> ";   ?>   
                          </div>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        <div class="container-fluid">
          <br>
          <br>
          <h3 class="card-title">&nbspLista e Lëndëve </h3>
          <br><br>
      <table class="table table-bordered table-hover" id="list">
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
            <th>Pyetja</th>
            <th>Niveli</th>
            <th>Pikët</th>
           
            <th>Veprimet</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
            $qry = $lidh->query("SELECT * from `question_list` where question_paper_id = '$id' and `level` = '{$level}' ");
            while($row = $qry->fetch_assoc()):
          ?>
            <tr>
              <td class="text-center"><?php echo $i++; ?></td>
              <td><?php echo $row['question'] ?></td>
              <td ><p class="m-0 truncate-1"><?= $row['level'] ?></p></td>
              <td ><p class="m-0 truncate-1"><?= $row['points'] ?></p></td>

              
              <td align="center">
                 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              Veprimet
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                          <?php echo "<a class='dropdown-item edit_data'href=\"update_course.php?id=$row[id]\"><span class='fa fa-edit text-primary'></span>Modifiko</a> ";   ?>  
                            
                           
                           
                            <?php echo "<a class='dropdown-item edit_data' href=\"delete_course.php?id=$row[id]\"  onClick=\"return confirm('A jeni të sigurt se dëshironi të fshini lëndën?')\" ><span class='fa fa-trash text-danger'></span> Fshij</a> ";   ?>   
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
</html><script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
