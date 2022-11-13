<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
    include("kontrollo.php");   
?>
<?php

require_once('konfigurimi.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $lidh->query("SELECT * from `question_paper_list` where id = '{$_GET['id']}' ");
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

    if(isset($_POST['updatepaper']))
    { 
      $id1 =$_POST['id'];
      $title=$_POST['title'];
      $description=$_POST['description'];
      

      // checking empty fields
      if(empty($title) || empty($description)) {  
          
        if(empty($title)) {
          echo "<font color='red'>Fusha name eshte e zbrazet..</font><br/>";
        }
        
        if(empty($description)) {
          echo "<font color='red'>Fusha description eshte e zbrazet.</font><br/>";
        }
            
      } else {  
        //updating the table
        $rezultati = mysqli_query($lidh,"UPDATE question_paper_list SET title='$title', description='$description' WHERE id =$id1");
        
        //redirectig to the display message. In our case, it is ballina.php
        header("Location: Provimi.php");
      }
    }
    ?>
    <?php
    //getting ID_Pacienti  from url
    $id= $_GET['id'];

    //selecting data associated with this particular ID_Pacienti 
    $rezultati = mysqli_query($lidh,"SELECT * FROM question_paper_list WHERE id=$id");

    while($res = mysqli_fetch_array($rezultati))
    {
      $title=$res['title'];
      $description=$res['description'];
      $class_id=$res['class_id'];
      
      
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
            <h1 style="text-align: center; padding: 2%">Modifiko Detajet e Provimit</h1>
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content"  style="padding-right:20%; padding-left: 20%">
     <div class="card-header" style=" ">
           <div class="card card-primary">
              <div class="card-header" style=" background-color: #001f42!important;">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  action="update_paper.php" method="post" name="form1" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Titulli</label>
                    <input type="text" class="form-control" name="title" placeholder="" value='<?php echo $title;?>' >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Instruksione</label>
                    <input type="text" class="form-control" name="description" placeholder="" value='<?php echo $description;?>' >
                  </div>
                 
                 
                </div>
                
                
                 
                </div>
               
                <!-- /.card-body -->

                <div class="card-footer">
<input type="hidden" name="id" value='<?php echo $_GET['id'];?>' />
                  
                  <button type="submit"style="background-color: #001f42;
    border-color: #001f42;"   name="updatepaper" class="btn btn-primary">Modifiko</button>
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
