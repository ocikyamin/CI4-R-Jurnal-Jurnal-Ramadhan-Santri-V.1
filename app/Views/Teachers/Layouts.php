<!DOCTYPE html>
<html lang="en">
<head>
    <title>MTIC | R-Jurnal</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?=base_url('favicon.png')?>" type="image/x-icon">
<link rel="shortcut icon" href="<?=base_url('favicon.png')?>" type="image/x-icon">
<meta name="theme-color" content="#4e73df">
<meta name="msapplication-TileColor" content="#4e73df">
    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>public/SB/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>public/SB/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?=base_url()?>public/SB/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
       <!-- Sweatalert  -->
       <link rel="stylesheet" href="<?=base_url()?>public/SB/sweetalert2/dist/sweetalert2.min.css" />
       <script src="<?=base_url()?>public/SB/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?=base_url()?>public/SB/vendor/jquery/jquery.min.js"></script>
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('walas')?>">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <i class="fas fa-mosque"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="text-transform: capitalize;">R-Jurnal <sup>.</sup></div>
            </a>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-white" href="<?=base_url('walas')?>">
                    <i class="fas fa-fw text-white fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading text-warning">
                My Class
            </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                <a class="nav-link text-white" href="<?=base_url('walas/student')?>">
                <i class="fas fa-fw fa-users text-white"></i>
                <span>Santri</span></a>
                </li>
                <li class="nav-item mt-0">
                <a class="nav-link text-white" href="<?=base_url('walas/jurnal/kelas/'.MyClass()->id.'/date/'.date('Y-m-d'))?>">
                <i class="fas fa-fw fa-folder-open text-white"></i>
                <span>Riwayat</span></a>
                </li>
          

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-warning">
                Account
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link text-white" href="<?=base_url('walas')?>">
                    <i class="fas fa-fw fa-user text-white"></i>
                    <span>Profile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="#">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
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
                <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars text-white"></i>
                    </button>
                    <!-- Topbar Search -->
                    <div
                        class="d-none text-white d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
                                <span class="mr-2 d-none d-lg-inline text-white small"><?=Teacher()->teacher_name?></span>
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
                    <a class="btn btn-primary" href="<?=base_url('walas/logout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
  
    <script src="<?=base_url()?>public/SB/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="<?=base_url()?>public/SB/vendor/jquery-easing/jquery.easing.min.js"></script> -->
     <!-- Page level plugins -->
     <script src="<?=base_url()?>public/SB/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>public/SB/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>public/SB/js/sb-admin-2.min.js"></script>
    <script>
        // Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});
    </script>

</body>

</html>