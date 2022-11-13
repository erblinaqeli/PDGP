 <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #001f42">
    <!-- Brand Logo -->
    <a href="Ballina.php" class="brand-link">
      <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> <?php
            $rezultati = mysqli_query($lidh,"SELECT * FROM manage_data WHERE pageLayout='emri'");
            while ($rresht = mysqli_fetch_assoc($rezultati)) {

              extract($rresht);
           echo $description1;
        
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

      }
            ?></span>
    </a>
