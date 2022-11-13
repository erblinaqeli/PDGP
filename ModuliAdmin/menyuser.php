
<div class="sidebar" style="background-color: #001f42">
      <!-- Sidebar user panel (optional) -->
      
      <!-- SidebarSearch Form -->
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="Ballina.php" class="nav-link">
              <i class="nav-icon fas fa-house-user"></i>
              <p>
                  <?php
            $rezultati = mysqli_query($lidh,"SELECT * FROM manage_data WHERE pageLayout='menuadm' AND `title1`= 'Meny1'");
            while ($rresht = mysqli_fetch_assoc($rezultati)) {

              extract($rresht);
           echo $description1;
        
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

      }
            ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Lenda.php" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
               <?php
            $rezultati = mysqli_query($lidh,"SELECT * FROM manage_data WHERE pageLayout='menuadm' AND `title1`= 'Meny2'");
            while ($rresht = mysqli_fetch_assoc($rezultati)) {

              extract($rresht);
           echo $description1;
        
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

      }
            ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Klasa.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
                          <p>
               <?php
            $rezultati = mysqli_query($lidh,"SELECT * FROM manage_data WHERE pageLayout='menuadm' AND `title1`= 'Meny3'");
            while ($rresht = mysqli_fetch_assoc($rezultati)) {

              extract($rresht);
           echo $description1;
        
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

      }
            ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="Provimi.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                <?php
            $rezultati = mysqli_query($lidh,"SELECT * FROM manage_data WHERE pageLayout='menuadm' AND `title1`= 'Meny4'");
            while ($rresht = mysqli_fetch_assoc($rezultati)) {

              extract($rresht);
           echo $description1;
        
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

      }
            ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="users.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                <?php
            $rezultati = mysqli_query($lidh,"SELECT * FROM manage_data WHERE pageLayout='menuadm' AND `title1`= 'Meny5'");
            while ($rresht = mysqli_fetch_assoc($rezultati)) {

              extract($rresht);
           echo $description1;
        
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

      }
            ?>

              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="admusers.php" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                <?php
            $rezultati = mysqli_query($lidh,"SELECT * FROM manage_data WHERE pageLayout='menuadm' AND `title1`= 'Meny6'");
            while ($rresht = mysqli_fetch_assoc($rezultati)) {

              extract($rresht);
           echo $description1;
        
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

      }
            ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="update_pagename.php" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                <?php
            $rezultati = mysqli_query($lidh,"SELECT * FROM manage_data WHERE pageLayout='menuadm' AND `title1`= 'Meny7'");
            while ($rresht = mysqli_fetch_assoc($rezultati)) {

              extract($rresht);
           echo $description1;
        
if($rezultati==null)
  mysqli_free_rezultati($rezultati);

      }
            ?>
              </p>
            </a>
          </li>
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
