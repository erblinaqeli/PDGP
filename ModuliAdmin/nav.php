<nav class="main-header navbar navbar-expand navbar-light shadow text-sm">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
             <?php
                      $res=mysqli_query($lidh,"SELECT * FROM manage_data WHERE pageLayout='emri'");
                      while($rresht=$res->fetch_array())
                      {
                      ?>
            <a href="" class="nav-link"><?php echo $rresht['title1'];?> </a><?php
                      }
                      ?>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <!-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li> -->
          <!-- Messages Dropdown Menu -->
          <li class="nav-item">
            <div class="btn-group nav-link">
              
                     
                  <button style="padding-left: 15%;"type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">

                   <?php
                      $res=mysqli_query($lidh,"
              SELECT `firstname`,`lastname`,`foto` FROM `users_adm` WHERE id='$kyc_perd'");
                      while($rresht=$res->fetch_array())
                      {
                      ?>
                       <span><?php echo '<img class="img-circle elevation-2 user-img" alt="User Image" src="data:images/jpeg;base64,'.base64_encode( $rresht['foto'] ).'">'; ?></span>
                    <span class="ml-3"><?php echo $rresht['firstname'];?></span><?php
                      }
                      ?>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="update_self.php"><span class="fa fa-user"></span> Llogaria ime</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="dil.php"><span class="fas fa-sign-out-alt"></span> Dil</a>
                  </div>
                   
              </div>
          </li>
          <li class="nav-item">
            
          </li>
         <!--  <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
          </li> -->
        </ul>
      </nav>