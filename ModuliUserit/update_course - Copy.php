<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
  include("kontrollo.php"); 
?>

<?php
// including the database lidhection file
include_once("konfigurimi.php");

    if(isset($_POST['updateclass']))
    { 
      $id =$_POST['id'];
      $course_id =$_POST['course_id'];    
      

      $name=$_POST['name'];
      $description=$_POST['description'];
      

      // checking empty fields
      if(empty($name) || empty($description)) {  
          
        if(empty($name)) {
          echo "<font color='red'>Fusha name eshte e zbrazet..</font><br/>";
        }
        
        if(empty($description)) {
          echo "<font color='red'>Fusha description eshte e zbrazet.</font><br/>";
        }
            
      } else {  
        //updating the table
        $rezultati = mysqli_query($lidh,"UPDATE course_list SET name='$name', description='$description', course_id='$course_id' WHERE id =$id ");
        
        //redirectig to the display message. In our case, it is ballina.php
        header("Location: Klasa.php");
      }
    }
    ?>
    <?php
    //getting ID_Pacienti  from url
    $id=$_GET['id'];

    //selecting data associated with this particular ID_Pacienti 
    $rezultati = mysqli_query($lidh,"SELECT * FROM course_list WHERE id='$id'");

    while($res = mysqli_fetch_array($rezultati))
    {
      $name=$res['name'];
      $description=$res['description'];
      $course_id=$res['course_id'];
      
      
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

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    
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
            <h1 style="text-align: center; padding: 2%">Modifiko Detajet e Lëndës</h1>
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content"  style="padding-right:20%; padding-left: 20%">
      <div class="container-fluid">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  action="update_course.php" method="post" name="form1" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Emri</label>
                    <input type="text" class="form-control" name="name" placeholder="" value='<?php echo $name;?>' >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Pershkrimi</label>
                    <textarea class="form-control" name="description" placeholder="" ><?php echo $description;?></textarea>
                  </div>
                  <div class="form-group">
                 <input type="hidden" name="id"  value='<?php echo $_GET['id'];?>'  />
                    </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="updatecourse" class="btn btn-primary">Modifiko</button>
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
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <?php echo $kyc_perd ?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
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
