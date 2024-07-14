<?php

require_once('../../config/koneksi.php');

function handleFileUpload($file) {

    $targetDirectory = '../../assets/designer/portfolio';
    // Pastikan tidak ada kesalahan pada unggahan
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    // Periksa jenis file yang diizinkan
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        return false;
    }

    // Buat nama unik untuk file yang diunggah
    $fileName = uniqid('file_') . '.' . $fileExtension;

    // Tentukan path lengkap untuk menyimpan file yang diunggah
    $targetPath = $targetDirectory . '/' . $fileName;

    // Pindahkan file ke direktori tujuan
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $fileName; // Mengembalikan nama file yang berhasil diunggah
    } else {
        return false;
    }
}

function updateDesign($judul,  $deskripsi, $gambar, $id)
{
    global $conn;
    if ($gambar['name'] !== '') {
        $gambarName = handleFileUpload($gambar);
    } else {
        // Jika tidak ada gambar baru, gunakan gambar sebelumnya
        $query = "SELECT tautan_gambar FROM design WHERE id='$id'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $gambarName = $row['tautan_gambar'];
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat memperbarui data pekerjaan.";
            echo "<script>alert('Gagal memperbarui data pekerjaan')</script>";
            header("Location: ../edit-portfolio.php?id=". $id);
            exit();
        }
    }

    $query = "UPDATE design SET judul='$judul',deskripsi='$deskripsi', tautan_gambar='$gambarName' WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Berhasil')</script>";
        header("Location: ../daftar-portfolio.php");
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat memperbarui data pekerjaan.";
        echo "<script>alert('Gagal memperbarui data pekerjaan')</script>";
        header("Location: ../edit-portfolio.php?id=". $id);
        exit();
    }
}




if (isset($_POST["simpan"])){
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar'];
    $id_user= $_POST['id_user'];
    
    $gambarName = handleFileUpload($gambar);

    // Menyimpan data ke dalam tabel
    $query = "INSERT INTO design (judul, deskripsi, tautan_gambar, id_pemilik) VALUES ('$judul','$deskripsi', '$gambarName','$id_user')";

    if($gambarName){
        if ($conn->query($query) === TRUE) {
            echo "<script>alert(' Berhasil')</script>";
            header("Location: ../buat-portfolio.php");
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
            echo "<script>alert('Registrasi gagal')</script>";
            header("Location: ../buat-portfolio.php");
            exit();
        }
    }else{
        $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
        echo "<script>alert('Registrasi gagal')</script>";
        header("Location: ../buat-portfolio.php");
        exit();
    }
}

if (isset($_POST["edit"])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar'];
    $id = $_POST['id'];

    updateDesign($judul, $deskripsi, $gambar, $id);
}

if(isset($_GET['hapus']) && $_GET['hapus'] != ''){
    $id = $_GET['hapus'];
    $query = "DELETE FROM design WHERE id = '$id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert(' Berhasil')</script>";
        header("Location: ../daftar-portfolio.php");
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
        echo "<script>alert('Registrasi gagal')</script>";
        header("Location: ../daftar-portfolio.php");
        exit();
    }
}

?>
