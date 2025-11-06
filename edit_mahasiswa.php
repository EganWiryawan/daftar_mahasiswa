<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    
    if(!$data) {
        $_SESSION['notification'] = [
            'type' => 'error',
            'message' => 'Data mahasiswa tidak ditemukan!'
        ];
        header("Location: list_mahasiswa.php");
        exit();
    }
} else {
    header("Location: list_mahasiswa.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <!-- SweetAlert CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #button-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        #back-button {
            background: blue;
            border-radius: 10px;
            padding: 15px;
            flex: 1;
            text-align: center;
        }
        #back-button a {
            color: white;
            text-decoration: none;
        }
        #daftar-button {
            background-color: green;
            border-radius: 15px;
            flex: 1;
            color: white;
            padding: 15px;
            border: none;
            cursor: pointer;
        }
        #daftar-button:hover {
            background-color: darkgreen;
        }
        .copyright {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($data['nim']); ?>" required>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="L" <?php echo ($data['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="P" <?php echo ($data['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
            </select>

            <label for="prodi">Program Studi:</label>
            <select id="prodi" name="prodi" required>
                <option value="SI" <?php echo ($data['prodi'] == 'SI') ? 'selected' : ''; ?>>Sistem Informasi</option>
                <option value="TI" <?php echo ($data['prodi'] == 'TI') ? 'selected' : ''; ?>>Teknik Informatika</option>
                <option value="MI" <?php echo ($data['prodi'] == 'MI') ? 'selected' : ''; ?>>Manajemen Informatika</option>
            </select>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($data['alamat']); ?>" required>

            <label for="no_hp">No. HP:</label>
            <input type="text" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($data['no_hp']); ?>" required>

            <div id="button-container">
                <div id="back-button">
                    <a href="list_mahasiswa.php">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
                <button type="submit" id="daftar-button">Simpan Perubahan</button>
            </div>
        </form>
        <div class="copyright">
            Egan Wiryawan - 2411700008
        </div>
    </div>

    <script>
    // Notifikasi SweetAlert
    <?php
    if (isset($_SESSION['notification'])) {
        $notif = $_SESSION['notification'];
        echo "Swal.fire({
            icon: '".$notif['type']."',
            title: '".$notif['message']."',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });";
        unset($_SESSION['notification']);
    }
    ?>
    </script>
</body>
</html>
<?php mysqli_close($koneksi); ?>
