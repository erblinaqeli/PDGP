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
      .dataTables_filter {
        float: right;
      }
       .pagination{
        float: right;
      }
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
            
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <a href="add_class.php" class="btn-sm btn-primary" style="background-color: #001f42!important;border-color:#001f42!important; padding: 1%; float: right;margin-right: 5%; margin-bottom: 2%">+ Shto Klasë</a>
            <div class="card-body">
        <div class="container-fluid">
          <br>
          <br>
          <h3 class="card-title">&nbspLista e Klasave</h3>
          <br><br>
      <table id="example1" class="table table-bordered table-striped">
        
        <thead>
          <tr>
            <th>#</th>
            <th>Data Krijuar</th>
            <th>Lënda</th>
            <th>Klasa</th>
            <th>Përshkrimi</th>
            <th>Veprimet</th>
          </tr>
        </thead>
        <tbody>
         <?php 
          $i = 1;
            $qry = $lidh->query("SELECT c.*,cc.name as `course` from `class_list` c inner join `course_list` cc on c.course_id = cc.id where  c.user_id = '$kyc_perd' order by cc.`name` asc,c.`name` asc ");
            while($row = $qry->fetch_assoc()):
          ?>
            <tr>
              <td class="text-center"><?php echo $i++; ?></td>
              <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
              <td><?php echo $row['course'] ?></td>
              <td><?php echo $row['name'] ?></td>
              
              <td ><p class="m-0 truncate-1"><?= $row['description'] ?></p></td>
              
              <td align="center">
                 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              Veprimet
                          </button>
                          <div class="dropdown-menu" role="menu">
                          <?php echo "<a class='dropdown-item edit_data'href=\"update_class.php?id=$row[id]\"><span class='fa fa-edit text-primary'></span>Modifiko</a> ";   ?>  
                            
                           
                           
                            <?php echo "<a class='dropdown-item edit_data' href=\"delete_class.php?id=$row[id]\"  onClick=\"return confirm('A jeni të sigurt se dëshironi të fshini klasën?')\" ><span class='fa fa-trash text-danger'></span> Fshij</a> ";   ?>   
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
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
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
</body>
</html>
