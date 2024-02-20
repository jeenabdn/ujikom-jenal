<?php 
include 'koneksi.php';
$sql = "SELECT * FROM perpus";
$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .scrollable-form {
            overflow-y: auto;
            max-height: 400px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="scrollable-form">
            <form action="proses/proses_register.php" method="post">
                <h1>Daftar Akun</h1>
                <?php
                    if ($result) {
                        echo "<label for='perpustakaan'></label>";
                        echo "<select class='form-control' name='perpustakaan' required>";
                        echo "<option>Pilih</option>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            $nama_perpustakaan = $row['nama_perpus'];
                            $id_perpus = $row['id'];
                            echo "<option value='$id_perpus'>$nama_perpustakaan</option>";
                        }

                        echo "</select>";
                    } else {
                        echo "Gagal mengambil data outlet.";
                    }
                ?>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
                <textarea name="alamat" placeholder="Alamat" required></textarea>
                <input type="text" name="role" value="peminjam" style="display: none;">
                <input type="text" name="perpus_id" value="1" style="display: none;">
                <button type="submit" name="daftar">Daftar</button>
                <a href="login.php">Kembali ke login</a>
            </form>
        </div>
    </div>
</body>
</html>
