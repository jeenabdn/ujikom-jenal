<?php
include 
'../koneksi.php';
    if(isset($_POST['login'])){
    // dd($_POST);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $admin = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    //var_dump($koneksi);
    
    if($data = mysqli_fetch_assoc($admin)){
      if(password_verify($password, $data['password'])){
        $_SESSION['username'] = $data['username'];
        
        if($data['role'] == 'admin'){
          $_SESSION['id'] = $data['id'];
          $_SESSION['role'] = $data['role'];
           header('Location: ../admin/index.php');
        }
        elseif($data['role'] == 'petugas'){
          $_SESSION['id'] = $data['id'];
          $_SESSION['role'] = $data['role'];
          header('Location: ../admin/index.php');
          //echo"Masuk ke petugas";
        }
        elseif($data['role'] == 'peminjam'){
          $_SESSION['role'] = $data['role'];
          header('Location: ../admin/pengguna.php');
          //echo"Masuk ke peminjam";
        }
        //header('location: admin/index.php');
      } else {
        header('Location: ../login.php');
      }
    } else {
      header('Location: ../login.php');
    }
}
        ?>