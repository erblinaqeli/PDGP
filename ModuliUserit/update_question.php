<?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
    include("kontrollo.php");  

?>
<?php
// including the database lidhection file
include_once("konfigurimi.php");

    if(isset($_POST['updatequestion']))
    { 
      $idpytja =$_POST['idpytja'];
      $question=$_POST['question'];
      $level=$_POST['level'];


      $points =$_POST['points'];    
     
       
        //updating the table
        $rezultati = mysqli_query($lidh,"UPDATE question_list SET question='$question', level='$level', points='$points' WHERE idpytja=$idpytja");
        
        //redirectig to the display message. In our case, it is ballina.php
        header("Location: Provimi.php");
      }
    
    ?>
    <?php
    //getting ID_Pacienti  from url
    $idpytja= $_GET['idpytja'];

    //selecting data associated with this particular ID_Pacienti 
    $rezultati = mysqli_query($lidh,"SELECT * FROM question_list WHERE idpytja=$idpytja");

    while($res = mysqli_fetch_array($rezultati))
    {
      $question=$res['question'];
      $level=$res['level'];
      $points=$res['points'];
      
      
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

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
      <div class="container-fluid" style="    padding-bottom: 5%;">
            <h1 style="text-align: center; padding: 2%">Modifiko Pyetjen</h1>
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $lidh->query("SELECT q.*,CONCAT(cc.name,' - ',c.name) as `class` from `question_paper_list` q inner join class_list c on q.class_id = c.id inner join course_list cc on c.course_id = cc.id where q.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
  $idpytja= $_GET['idpytja'];
   
?>
    <!-- Main content -->
    <div class="content"  style="padding-right:20%; padding-left: 20%">
      <div class="container-fluid">
           <div class="card card-primary">
              <div class="card-header" style=" background-color: #001f42!important;">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  action="update_question.php" method="post" name="form1"  >
                  <div class="card-body">
                <div class="form-group">
                    <label for="question" class="control-label">Question</label>
                    <textarea type="text" name="question" id="your_summernote" value='<?php echo $question;?>'  class="form-control form-control-sm rounded-0 summernote" required><?php echo $question;?></textarea>

                </div>
                <div class="form-group">
                    
                    <label for="level" class="control-label">Zgjedheni nivelin e vështirësisë</label>
               <select id="level" class="form-control"name="level">
                 <option value="$level">Zgjedh Nivelin</option>
                 <option value="1" >Të Lehtë</option>
                 <option value="2" >Të Mesëm</option>
                 <option value="3" >Të Vështirë</option>
               </select>
                </div>
                <div class="form-group" style="display: none;">
                    <input type="number" class="form-control form-control-sm rounded-0" value='{$id}'name="question_paper_id" />
                </div>
                 <div class="form-group">
                    <label for="mark" class="control-label">Pikët</label>
                    <input type="number" name="points" id="points" value='<?php echo $points;?>'class="form-control form-control-sm rounded-0"  required/>
                </div>
                <input type="hidden" name="idpytja" value='<?php echo $_GET['idpytja'];?>' />
                  <div class="card-footer">
                  <button  type="submit"style="background-color: #001f42;
    border-color: #001f42;"  name="updatequestion" class="btn btn-primary">Modifiko</button>
                </div>
              </form>
               
               
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
  </div>
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
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote();
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>
</html>
