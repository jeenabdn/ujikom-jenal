<?php 
include '../koneksi.php';
$sql = "SELECT * FROM kategori_buku ";
$result = mysqli_query($koneksi, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="../dashboard/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="../dashboard/stylesheet">

    <!-- Custom styles for this template-->
    <link href="../dashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Hi admin</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item ">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Menu
</div>

<!-- Nav Item - Pengguna -->
<li class="nav-item">
    <a class="nav-link" href="pengguna.php">
        <i class="fas fa-fw fa-user"></i>
        <span>Pengguna</span></a>
</li>

<!-- Nav Item - Peminjam -->
<li class="nav-item">
    <a class="nav-link" href="peminjam.php">
        <i class="fas fa-fw fa-users"></i>
        <span>Peminjam</span></a>
</li>

<!-- Nav Item - Buku -->
<li class="nav-item">
    <a class="nav-link" href="buku.php">
        <i class="fas fa-fw fa-book"></i>
        <span>Buku</span></a>
</li>
<!-- Nav Item - ulasan buku -->
<li class="nav-item">
    <a class="nav-link" href="ulasan.php">
    <i class="fas fa-comments"></i>
    <span>Ulasan</span></a>
</li>
<!-- Nav Item - ulasan buku -->
<li class="nav-item active">
    <a class="nav-link" href="kategori.php">
    <i class="fas fa-pen-nib"></i>
    <span>Kategori</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">



<!-- Sidebar Message -->


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

                    <!-- Topbar Search -->
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        
                        <!-- Nav Item - User Information -->
                    
                            <!-- Dropdown - User Information -->
                            <li class="nav-item">
                            <a href="../login.php" class="nav-link" role="button">
                            <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="content-wrape shadow shadow p-3 m-5 bg-body-tertiary">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
                        <a href="tambah/tambah_kategori.php" class="btn btn-primary">Tambah Kategori</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="row">

<!-- Books Card Example -->
<section class="content">
  <div class="container-fluid">
    <div class="table-container">
      <table class="table" style = "margin-left:240px;">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) :
                    $i++;
                ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['nama_kategori']; ?></td>
                <td>
                <a class="btn btn-primary" href='edit/edit_kategori.php?id=<?php echo $row['kategori_id']; ?>'>Edit</a>
                <a href="hapus/hapus_kategori.php?id=<?= $row['kategori_id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin ingin menghapus kategori ini?')">Hapus</a>
              </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

                    

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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>