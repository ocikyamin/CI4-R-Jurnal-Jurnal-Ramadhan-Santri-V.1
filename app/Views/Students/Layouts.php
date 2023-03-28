<!DOCTYPE html>
<html lang="en">
<head>
    <title>R-Jurnal | Home</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#4e73df">
<meta name="msapplication-TileColor" content="#4e73df">
    <link rel="icon" href="<?=base_url('favicon.png')?>" type="image/x-icon">
<link rel="shortcut icon" href="<?=base_url('favicon.png')?>" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>public/SB/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>public/SB/css/sb-admin-2.min.css" rel="stylesheet">
       <!-- Sweatalert  -->
       <link rel="stylesheet" href="<?=base_url()?>public/SB/sweetalert2/dist/sweetalert2.min.css" />
       <script src="<?=base_url()?>public/SB/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?=base_url()?>public/SB/vendor/jquery/jquery.min.js"></script>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('student')?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-mosque"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="text-transform: capitalize;">R-Jurnal <sup>.</sup></div>
            </a>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?=base_url('student')?>">
                    <i class="fas fa-fw fa-home text-white shadow"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading text-warning">
                JurnalKu
            </div>
            <li class="nav-item">
                <a class="nav-link text-white collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-fw fa-bookmark text-white shadow"></i>
                    <span>Riwayat</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Jurnal Saya</h6>
                            <?php
                            $i=1;
                            if (!empty(MyJurnal(Student()->rombel_id,Student()->id))) {
                            foreach (MyJurnal(Student()->rombel_id,Student()->id) as $key) {
                            ?>
                            <a href="<?=base_url('student/jurnalku/'.$key['id'])?>" class="collapse-item">
                            <?=$i++?>. Tanggal <?=date('d/m/Y', strtotime($key['tgl_jurnal']))?>
                            </a>
                            <?php
                            }
                            }else{
                            ?>
                            <a class="collapse-item" href="<?=base_url('student/buat-jurnal')?>">Buat Jurnal</a>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?=base_url('student/target')?>">
                    <i class="far fa-fw fa-copy text-white shadow"></i>
                    <span>Target</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" target="_blank" href="<?=base_url('student/cetak/'.Student()->id)?>">
                    <i class="fa fa-fw fa-print text-white shadow"></i>
                    <span>Cetak</span></a>
            </li>
            
            <hr class="sidebar-divider">
            <div class="sidebar-heading text-warning">
                Account
            </div>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?=base_url('student')?>">
                    <i class="fas fa-fw fa-user text-white shadow"></i>
                    <span>Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="#">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <div class="sidebar-card d-none d-lg-flex">
                <p class="text-center mb-2"><strong>R-Jurnal</strong> Versi 1.1</p>
                <a class="btn btn-success btn-sm" href="#">New</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow-sm">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars text-white"></i>
                    </button>
                    <div class="d-none d-sm-inline-block text-white form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      MTI CANDUANG
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link text-white" href="#">
                            <i class="far fa-calendar-alt mr-2"></i> 1444 H
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small"><?=Student()->nama?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?=base_url('public/default.webp')?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Bottom Navbar -->
  <nav class="navbar navbar-dark bg-gradient-primary navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none">
    <ul class="navbar-nav nav-justified w-100">
      <li class="nav-item">
        <a href="<?=base_url('student')?>" class="nav-link">
        <i class="fa fa-lg fa-home"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?=base_url('student/target')?>" class="nav-link">
        <i class="far fa-lg fa-bookmark"></i>
        </a>
      </li>
      <li class="nav-item bg-white" style="border-radius:50px;">
        <a href="<?=base_url('student/buat-jurnal')?>" class="nav-link">
        <!-- <i class="fas fa-2x fa-plus text-primary shadow"></i> -->
        <i class="fas fa-2x fa-plus-circle text-primary"></i>
        </a>
      </li>
      <li class="nav-item">
        <a target="_blank" href="<?=base_url('student/cetak/'.Student()->id)?>" class="nav-link">
        <i class="fa fa-lg fa-print"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
        <i class="far fa-lg fa-user"></i>
        </a>
      </li>
    </ul>
  </nav>
                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
          -->
          <?=$this->renderSection('content') ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; R-Jurnal</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?=base_url('student/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
  
    <script src="<?=base_url()?>public/SB/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="<?=base_url()?>public/SB/vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>public/SB/js/sb-admin-2.min.js"></script>

</body>

</html>