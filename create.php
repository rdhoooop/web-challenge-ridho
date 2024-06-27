<!DOCTYPE html>
<html>
<head>
    <title>Form Pengisian barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, #ffecd2, #fcb69f);
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 50px auto;
        }
        .form-title {
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            color: #ff6f61;
        }
        .btn-primary {
            background-color: #ff6f61;
            border-color: #ff6f61;
        }
        .btn-primary:hover {
            background-color: #e65b54;
            border-color: #e65b54;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $kode_barang = input($_POST["kode_barang"]);
        $nama_barang = input($_POST["nama_barang"]);
        $persediaan = input($_POST["persediaan"]);
        $harga_awal = input($_POST["harga_awal"]);
        $jumlah = input($_POST["jumlah"]);

        //Query input menginput data kedalam tabel anggota
        $sql = "insert into toko(kode_barang, nama_barang, persediaan, harga_awal, jumlah) values ('$kode_barang', '$nama_barang', '$persediaan', '$harga_awal', '$jumlah')";

        //Mengeksekusi/menjalankan query diatas
        $hasil = mysqli_query($kon, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            echo "<div class='alert alert-success text-center'> Data berhasil ditambahkan.</div>";
            echo "<meta http-equiv='refresh' content='1; url=index.php'>";
        } else {
            echo "<div class='alert alert-danger text-center'> Data gagal ditambahkan.</div>";
        }
    }
    ?>
    <div class="form-container">
        <h2 class="form-title">Masukkan Data Barang</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Kode Barang:</label>
                <input type="number" name="kode_barang" class="form-control" placeholder="Masukkan kode barang" required />
            </div>
            <div class="form-group">
                <label>Nama Barang:</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" required />
            </div>
            <div class="form-group">
                <label>Persediaan:</label>
                <input type="text" name="persediaan" class="form-control" placeholder="Jumlah Persediaan" required />
            </div>
            <div class="form-group">
                <label>Harga Awal:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" name="harga_awal" class="form-control" placeholder="Inputkan Harga Awal" required />
                </div>
            </div>
            <div class="form-group">
                <label>Jumlah:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" name="jumlah" class="form-control" placeholder="Masukkan jumlah" required />
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
