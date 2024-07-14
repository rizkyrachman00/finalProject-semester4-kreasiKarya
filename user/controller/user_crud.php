<?php

require_once('../../config/koneksi.php');

function handleFileUpload($file) {

    $targetDirectory = '../../assets/user/pekerjaan';
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

function updatePekerjaan($judulPekerjaan, $gaji, $tglMulai, $tglAkhir, $deskripsiPekerjaan, $gambarPekerjaan, $id_pekerjaan)
{
    global $conn;
    if ($gambarPekerjaan['name'] !== '') {
        $gambarName = handleFileUpload($gambarPekerjaan);
    } else {
        // Jika tidak ada gambar baru, gunakan gambar sebelumnya
        $query = "SELECT gambar FROM pekerjaan WHERE id_pekerjaan='$id_pekerjaan'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $gambarName = $row['gambar'];
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat memperbarui data pekerjaan.";
            echo "<script>alert('Gagal memperbarui data pekerjaan')</script>";
            header("Location: ../edit-loker.php?id=". $id_pekerjaan);
            exit();
        }
    }

    $query = "UPDATE pekerjaan SET judul_pekerjaan='$judulPekerjaan', gaji='$gaji', tanggal_mulai='$tglMulai', tanggal_akhir='$tglAkhir', deskripsi_pekerjaan='$deskripsiPekerjaan', gambar='$gambarName' WHERE id_pekerjaan='$id_pekerjaan'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Berhasil')</script>";
        header("Location: ../daftar-loker.php");
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat memperbarui data pekerjaan.";
        echo "<script>alert('Gagal memperbarui data pekerjaan')</script>";
        header("Location: ../edit-loker.php?id=". $id_pekerjaan);
        exit();
    }
}




if (isset($_POST["simpan"])){
    $judulPekerjaan = $_POST['judul_pekerjaan'];
    $gaji = $_POST['gaji'];
    $tglMulai = $_POST['tgl_mulai'];
    $tglAkhir = $_POST['tgl_akhir'];
    $deskripsiPekerjaan = $_POST['deskripsi_pekerjaan'];
    $gambarPekerjaan = $_FILES['gambar_pekerjaan'];
    $id_user= $_POST['id_user'];
    
    $gambarName = handleFileUpload($gambarPekerjaan);

    // Menyimpan data ke dalam tabel
    $query = "INSERT INTO pekerjaan (judul_pekerjaan, gaji, tanggal_mulai, tanggal_akhir, deskripsi_pekerjaan,gambar,id_user) VALUES ('$judulPekerjaan', '$gaji', '$tglMulai', '$tglAkhir', '$deskripsiPekerjaan', '$gambarName','$id_user')";

    if($gambarName){
        if ($conn->query($query) === TRUE) {
            echo "<script>alert(' Berhasil')</script>";
            header("Location: ../buat-loker.php");
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
            echo "<script>alert('Registrasi gagal')</script>";
            header("Location: ../buat-loker.php");
            exit();
        }
    }else{
        $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
        echo "<script>alert('Registrasi gagal')</script>";
        header("Location: ../buat-loker.php");
        exit();
    }
}

if (isset($_POST["edit"])) {
    $judulPekerjaan = $_POST['judul_pekerjaan'];
    $gaji = $_POST['gaji'];
    $tglMulai = $_POST['tgl_mulai'];
    $tglAkhir = $_POST['tgl_akhir'];
    $deskripsiPekerjaan = $_POST['deskripsi_pekerjaan'];
    $gambarPekerjaan = $_FILES['gambar_pekerjaan'];
    $id_pekerjaan = $_POST['id_pekerjaan'];

    updatePekerjaan($judulPekerjaan, $gaji, $tglMulai, $tglAkhir, $deskripsiPekerjaan, $gambarPekerjaan, $id_pekerjaan);
}

if(isset($_GET['hapus']) && $_GET['hapus'] != ''){
    $id = $_GET['hapus'];
    $query = "DELETE FROM pekerjaan WHERE id_pekerjaan = '$id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert(' Berhasil')</script>";
        header("Location: ../daftar-loker.php");
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
        echo "<script>alert('Registrasi gagal')</script>";
        header("Location: ../daftar-loker.php");
        exit();
    }
}

?>
