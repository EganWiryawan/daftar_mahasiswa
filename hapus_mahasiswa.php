<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Cek dulu apakah data ada
    $check = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = '$id'");
    
    if(mysqli_num_rows($check) > 0) {
        $sql = "DELETE FROM mahasiswa WHERE id = '$id'";
        
        if (mysqli_query($koneksi, $sql)) {
            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => 'Data mahasiswa berhasil dihapus!'
            ];
        } else {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Gagal menghapus data: ' . mysqli_error($koneksi)
            ];
        }
    } else {
        $_SESSION['notification'] = [
            'type' => 'error',
            'message' => 'Data mahasiswa tidak ditemukan!'
        ];
    }
    
    header("Location: list_mahasiswa.php");
    exit();
} else {
    header("Location: list_mahasiswa.php");
    exit();
}
?>
