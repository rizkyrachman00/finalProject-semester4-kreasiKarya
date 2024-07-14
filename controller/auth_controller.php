<?php
session_start(); // Memulai sesi


// Include file koneksi
include '../config/koneksi.php';

// Handle request login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $kata_sandi = $_POST['password'];
    
    $query = "SELECT * FROM pengguna WHERE username = '$username' AND kata_sandi = '$kata_sandi'";
    $result = $conn->query($query);
    
    // Memeriksa hasil query
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Menyimpan informasi pengguna ke dalam sesi
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['nama_pengguna'] = $row['nama_pengguna'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['foto_profil'] = $row['foto_profil'];
        $_SESSION['lokasi'] = $row['lokasi'];
        
        if ($row['level'] == 'designer'){
            header("Location: ../index.php");
        }elseif($row['level'] == 'client'){
            header("Location: ../index.php");
        }else{
            header("Location: ../admin");
        }
        exit();
    } else {
        // Jika username atau password tidak cocok, tampilkan pesan error
        $_SESSION['error'] = "Username atau password salah.";
        echo "<script>alert('Username atau password salah!')</script>";
        header("Location: ../login.php"); 
        exit();
    }
}

// Handle request register
if (isset($_POST['register'])) {
    $nama_pengguna = $_POST['full_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['role'];
    
    $query = "SELECT * FROM pengguna WHERE username = '$username'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        // Jika username sudah digunakan, tampilkan pesan error
        $_SESSION['error'] = "Username sudah digunakan.";
        header("Location: ../login.php"); // Ganti dengan halaman register jika registrasi gagal
        exit();
    } else {
        // Jika username tersedia, lakukan proses registrasi
        $query = "INSERT INTO pengguna (nama_pengguna, username, email, kata_sandi, level) VALUES ('$nama_pengguna','$username', '$email', '$password', '$level')";
        
        if ($conn->query($query) === TRUE) {
            // Jika registrasi berhasil, langsung melakukan login
            echo "<script>alert('Registrasi berhasil')</script>";
            header("Location: ../login.php");
        } else {
            // Jika terjadi kesalahan saat registrasi, tampilkan pesan error
            $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
            echo "<script>alert('Registrasi gagal')</script>";
            header("Location: ../login.php"); // Ganti dengan halaman register jika registrasi gagal
            exit();
        }
    }
}

if (isset($_GET['logout'])) {
    session_start();;
    session_destroy();
    unset($_SESSION);
    empty($_SESSION);
    header("Location: ../index.php");
}
?>
