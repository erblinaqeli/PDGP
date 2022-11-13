<?php
// including the database lidhection file
include_once("konfigurimi.php");
   

     $id = $_REQUEST['id'];
 
    ?>
    <?php
/* Faqja (home.php) e cila paraqitet pasi perdoruesi te llogohet me sukses */
  include("kontrollo.php"); 
?>
    <?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo "<scrtip> alert('You must fill generate form fields first'); location.replace(document.referer);</script>";
    exit;
}
extract($_POST);
if(isset($_POST['id']) && $_POST['id'] > 0){
    $qry = $lidh->query("SELECT q.*,CONCAT(cc.name,' - ',c.name) as `class` from `question_paper_list` q inner join class_list c on q.class_id = c.id inner join course_list cc on c.course_id = cc.id where q.id = '$id' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
$category = ["A.", "B.", "C."];
$current_category = 0;
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
            
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
     <button style="float: right;" class="btn btn-default border btn-flat btn-sm" id="print"><i class="fa fa-print"></i> Print</button>
       
            <div class="card-body"id="outprint">
        <div class="container-fluid">
      
    
            </div>
        
        <div class="card-body" id="outprint" style="padding:5%">
            <div >
                                <style>
                                  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
                                    .radio-choice{
                                        height:15px;
                                        width:15px;
                                        border: 1px solid #000;
                                        border-radius:50% 50%;
                                    }
                                    .check-choice{
                                        height:15px;
                                        width:15px;
                                        border: 1px solid #000;
                                    }
                                    .text-field{
                                        height:10em;
                                        width:100%;
                                    }
                                </style>

                                <div style="text-align: center!important;" >
                                <img src="images/logo.png" alt="" id="sys-logo" class="img-thumbnail img-circle rounded-circle border border-4" style="width:15%;
                                   height:15%">
                             <h5 style="font: italic 1.2em, "Lucida Sans"!important;><b>UNIVERSITETI "KADRI ZEKA"</b></h5>
                                <?php
                      $res=mysqli_query($lidh,"SELECT * from `question_paper_list` where id = '$id'");
                      while($rresht=$res->fetch_array())
                      {
                      ?><h4 class="m-2 text-center"><b><?php echo $rresht['title'] ?></b></h4>
                                
                                <h5 class="m-0 text-center"><b><?= isset($class) ? $class : "" ?></b></h5>
                              </div><h4 style="float: right;!important;"id="current_date" class="card-title" ></h4>
                                <small><i><b>General Instruction:</b><?php echo $rresht['description'] ?></i></small>
                                
                                <hr><?php
                      }
                      ?>
                                
                                
                                <?php $total= 0; ?>
                                    
                                
                                    <?php 
                                    $total= 0;
                                    $i = 1;
                                    $exists=array();
                                   
                            
                                    while(true):
                                     
                                        if($total==100):break; endif; 
                                          $questions = $lidh->query("SELECT * from `question_list` where question_paper_id = '$id' and `level` = '{$level}' order by RAND()");
                                          $row= $questions->fetch_assoc();
                                          $x=$row['idpytja'];
                                          $T=in_array($x,$exists);?>
                                           <?php if(!$T):?>
                                         
                                         
                                             
                                          
                                            
                                      
                                              <?php if(($total+$row['points']<101)):
                                                $total= $total + $row['points']; 
                                                    $x=$row['idpytja'];
                                                 $x;
                                                array_push($exists,$x);?>
                                    

                                         
                                                              
                                    <div class="question-item mb-3">
                                        <div class="d-flex w-100 mb-1">
                                            <div class="col-auto pr-1"><b><?php echo $i; ?>)</b></div>
                                            <div class="col-auto flex-shrink-1 flex-grow-1"><?=$row['question'] ?> <p style="float: right;"><?=$row['points'] ?></p></div>

                                        </div>
                                        <div class="mx-2 mb-3">
                                            <div class="text-field"></div>
                                        </div>
                                    </div><?php $i=$i+1; ?>
                                  

                                                <?php endif; ?>
                                     <?php endif; ?>
                                       
                                    <?php endwhile; ?>
                                    <p style="float">Piket Totale:<?php
                                    echo  $total;?></p>
                                    <?php $i=$i+1;?>
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
<script>

    $(function(){
        $('#print').click(function(){
          
            var p = $('#outprint').clone()
            var el = $('<div>')
           
            el.append(p)
            
            var nw = window.open("","_blank","width=10000,height=8000, left=200, top=50")
            nw.document.write(el.html())
            nw.document.close()
            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                    end_loader()
                }, 200);
            }, 300);
        })
    })
</script>
<script>
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("current_date").innerHTML = "Data:" + month + "/" + day + "/" + year;
</script>

