<!DOCTYPE html>
<html>
<head>
    <title>Challenge Ridho</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body {
            background-image: url('hai.JPEG'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Keeps the background image fixed while scrolling */
        }
        .navbar {
            border-radius: 0 0 20px 20px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table thead th {
            background-color: #343a40;
            color: white;
            border-color: #dee2e6;
            position: relative;
            text-align: center;
            vertical-align: middle;
        }
        .table tbody tr:hover {
            background-color: #f8d7da;
        }
        .table {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
        .btn {
            border-radius: 20px;
            background-color: #e83e8c;
            border: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #d63384;
        }
        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <span class="navbar-brand mb-0 h1">Challenge Ridho</span>
        <div class="btn-container text-center">
            <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h4 class="text-center mb-4">Persediaan Toko</h4>
        <?php
        include "koneksi.php";
        if (isset($_GET['kode_barang'])) {
            $kode_barang = htmlspecialchars($_GET["kode_barang"]);
            $sql = "DELETE FROM toko WHERE kode_barang='$kode_barang'";
            $hasil = mysqli_query($kon, $sql);
            if ($hasil) {
                echo "<div class='alert alert-success text-center'> Data berhasil dihapus.</div>";
                echo "<meta http-equiv='refresh' content='1; url=index.php'>";
            } else {
                echo "<div class='alert alert-danger text-center'> Data gagal dihapus.</div>";
            }
        }
        ?>
        <table class="table table-bordered table-hover table-striped text-center">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Persediaan</th>
                    <th scope="col">Harga Awal</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM toko ORDER BY kode_barang ASC";
                $hasil = mysqli_query($kon, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($data["kode_barang"]); ?></td>
                    <td><?php echo htmlspecialchars($data["nama_barang"]); ?></td>
                    <td><?php echo htmlspecialchars($data["persediaan"]); ?></td>
                    <td><?php echo 'Rp. ' . htmlspecialchars($data["harga_awal"]); ?></td>
                    <td><?php echo 'Rp. ' . htmlspecialchars($data["jumlah"]); ?></td>
                    <td>
                        <a href="update.php?kode_barang=<?php echo htmlspecialchars($data['kode_barang']); ?>" class="btn btn-warning btn-sm" role="button">Update</a>
                    </td>
                    <td>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?kode_barang=<?php echo htmlspecialchars($data['kode_barang']); ?>" class="btn btn-danger btn-sm" role="button">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
    </div>

    <div class="footer">
        TEKNOLOGI REKAYASA KOMPUTER JARINGAN - Fakultas Teknologi Industri - Universitas Bung Hatta - Sistem Manajemen Basis Data - Ridho Pratama Illahi - rdhoooop
    </div>

    <!-- Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF25ZxDjE2/g99p3ToWg90zFLLk7Uu5Kq49KPIKq6GH" crossorigin="anonymous"></script>
</body>
</html>
