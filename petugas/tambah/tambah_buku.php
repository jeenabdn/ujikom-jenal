<?php
include '../../koneksi.php';

$sql = "SELECT * FROM perpus";
$result = mysqli_query($koneksi, $sql);

$sql1 = "SELECT * FROM kategori_buku";
$result1 = mysqli_query($koneksi, $sql1);

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
    <link href="../../dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../dashboard/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="../../dashboard/stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../dashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <style>
        .login-container {
            margin-top: 50px;
            left: 200px;
            position: relative;
        }

        .scrollable-form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            overflow-y: hidden;
            /* Menghilangkan scrollbar vertikal */
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>




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
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>


            <!-- Nav Item - Buku -->
            <li class="nav-item active">
                <a class="nav-link" href="../buku.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Buku</span></a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                            <a href="../../login.php" class="nav-link" role="button">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="row">


                            <!-- Books Card Example -->
                            <div class="login-container col-lg-12" style="height:570px; width: 500px; overflow-y: auto; margin: 0 auto;">
                            <div class="scrollable-form" style="max-width: 600px; margin: 0 auto;">
                                    <form action="../../proses/proses_tambah_buku.php" method="post">
                                        <h1>Tambah buku</h1>
                                        <?php
                                        if ($result) {
                                            echo "<label for='perpustakaan'></label>";
                                            echo "<select class='form-control mb-2' name='perpustakaan' required>";
                                            echo "<option>pilih</option>";

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $nama_perpustakaan = $row['nama_perpus'];
                                                $id_perpus = $row['perpus_id'];
                                                echo "<option value='$id_perpus'>$nama_perpustakaan</option>";
                                            }

                                            echo "</select>";
                                        } else {
                                            echo "Gagal mengambil data outlet.";
                                        }
                                        ?>
                                        <input type="text" name="judul" placeholder="Judul Buku" required>
                                        <input type="text" name="penulis" placeholder="Penulis" required>
                                        <input type="text" name="penerbit" placeholder="Penerbit" required>
                                        <input type="text" name="tahun_terbit" placeholder="Tahun Terbit" required>
                                        <?php
                                        if ($result1) {
                                            echo "<label for='kategori'></label>";
                                            echo "<select class='form-control mb-4' name='kategori' required>";
                                            echo "<option>pilih kategori</option>";

                                            while ($rew = mysqli_fetch_assoc($result1)) {
                                                $nama_kategori = $rew['nama_kategori'];
                                                $kategori_id = $rew['kategori_id'];
                                                echo "<option value='$kategori_id'>$nama_kategori</option>";
                                            }

                                            echo "</select>";
                                        } else {
                                            echo "Gagal mengambil data outlet.";
                                        }
                                        ?>
                                        <button type="submit" name="daftar">Simpan Buku</button>
                                    </form>
                                </div>
                            </div>






                            <!-- Scroll to Top Button-->
                            <a class="scroll-to-top rounded" href="#page-top">
                                <i class="fas fa-angle-up"></i>
                            </a>

                            <!-- Logout Modal-->
                            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <script src="../../vendor/jquery/jquery.min.js"></script>
                            <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                            <!-- Core plugin JavaScript-->
                            <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

                            <!-- Custom scripts for all pages-->
                            <script src="../../js/sb-admin-2.min.js"></script>

                            <!-- Page level plugins -->
                            <script src="../../vendor/chart.js/Chart.min.js"></script>

                            <!-- Page level custom scripts -->
                            <script src="../../js/demo/chart-area-demo.js"></script>
                            <script src="../../js/demo/chart-pie-demo.js"></script>

</body>

</html>