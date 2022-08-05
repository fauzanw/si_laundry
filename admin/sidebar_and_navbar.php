 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <?php   
        $directoryURI = $_SERVER['REQUEST_URI'];
        $path = parse_url($directoryURI, PHP_URL_PATH);
        $components = explode('/', $path);
        $path = "{$components[2]}/{$components[3]}";
    ?>
     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon">
             <i class="fas fa-hashtag"></i>
         </div>
         <div class="sidebar-brand-text mx-3">S I Laundry</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item <?= ($path == "admin/" || $path == "admin/index.php")  ? "active":""; ?>">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span>
         </a>
     </li>

     <!-- Nav Item - Pelanggan -->
     <li class="nav-item <?= ($path == "admin/pelanggan.php")  ? "active":""; ?>">
         <a class="nav-link" href="pelanggan.php">
             <i class="fas fa-fw fa-user"></i>
             <span>Pelanggan</span>
         </a>
     </li>

     <!-- Nav Item - Transaksi -->
     <li class="nav-item <?= ($path == "admin/transaksi.php")  ? "active":""; ?>">
         <a class="nav-link" href="transaksi.php">
             <i class="fas fa-fw fa-scroll"></i>
             <span>Transaksi</span>
         </a>
     </li>

     <!-- Nav Item - Transaksi -->
     <li class="nav-item <?= ($path == "admin/laporan.php")  ? "active":""; ?>">
         <a class="nav-link" href="laporan.php">
             <i class="fas fa-fw fa-list"></i>
             <span>Laporan</span>
         </a>
     </li>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Pengaturan</span>
         </a>
         <div id="collapseTwo"
             class="collapse <?= ($path == "admin/harga.php" || $path == "admin/ganti_password.php")  ? "show":""; ?>"
             aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Administrator Setting:</h6>
                 <a class="collapse-item <?= ($path == "admin/harga.php")  ? "active":""; ?>" href="harga.php"><i
                         class="fas fa-dollar-sign"></i>&nbsp; Ubah
                     Harga</a>
                 <a class="collapse-item <?= ($path == "admin/ganti_password.php")  ? "active":""; ?>"
                     href="ganti_password.php"><i class="fas fa-lock"></i>&nbsp; Ganti Password</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->

 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

             <!-- Sidebar Toggle (Topbar) -->
             <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                 <i class="fa fa-bars"></i>
             </button>

             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">

                 <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi, <b>Admin</b></span>
                         <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="userDropdown">
                         <a class="dropdown-item" href="#">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Dashboard
                         </a>
                         <a class="dropdown-item" href="#">
                             <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                             Ganti Password
                         </a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="logout.php">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Logout
                         </a>
                     </div>
                 </li>

             </ul>

         </nav>
         <!-- End of Topbar -->