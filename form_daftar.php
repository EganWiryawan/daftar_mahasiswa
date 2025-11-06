<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa</title>
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
        <h2>Pendaftaran Mahasiswa Baru</h2>
        <form action="proses_daftar.php" method="POST">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>

            <label for="prodi">Program Studi:</label>
            <select id="prodi" name="prodi" required>
                <option value="SI">Sistem Informasi</option>
                <option value="TI">Teknik Informatika</option>
            </select>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="no_hp">No. HP:</label>
            <input type="text" id="no_hp" name="no_hp" required>

            <div id="button-container">
                <div id="back-button">
                    <a href="list_mahasiswa.php">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
                <button type="submit" id="daftar-button">Daftar</button>
            </div>
        </form>
        <div class="copyright">
            Egan Wiryawan - 2411700008
        </div>
    </div>
</body>
</html>
