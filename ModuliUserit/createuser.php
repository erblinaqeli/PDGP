<?php
/* Index.php faqja qe permban formen e loginit) */
  include('kycu.php'); // Include Login Script
  if ((isset($_SESSION['email']) != '')) 
  {
    header('Location: ballina.php');
  } 
?>

</style>
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
<div class="login-box" style=" width: 516px!important;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
   
    <div class="card-body">
      <div class="card card-primary">
             
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  action="adduser.php" method="post" name="form1"  >
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Emri</label>
                    <input type="text" class="form-control" name="firstname" placeholder=""  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mbiemri</label>
                    <input type="text" class="form-control" name="lastname" placeholder=""  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gjinia</label>
                    <input type="text" class="form-control" name="gender" placeholder=""  >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Data e lindjës</label>
                    <input type="date" class="form-control" name="dob" placeholder=""  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Emaili</label>
                    <input type="email" class="form-control" name="email" placeholder=""  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Fotoja juaj</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input name="userfile" type="file" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Fjalëkalimi</label>
                    <input type="password" class="form-control" name="password" placeholder=""  >
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button style="float: right;" type="submit"  name="adduser" class="btn btn-primary">Regjistrohu</button>
                    <div class="col-8">
             <a href="index.php">Kycu</a>
          </div>
                </div>
              </form>
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
