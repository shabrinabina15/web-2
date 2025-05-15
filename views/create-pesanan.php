<?php
require_once __DIR__ . '/../models/Anggota.php';
require_once __DIR__ . '/../models/Pegawai.php';
require_once __DIR__ . '/../models/KartuDiskon.php';
require_once __DIR__ . '/../models/Produk.php';
require_once __DIR__ . '/../models/Pesanan.php';

use models\Anggota;
use models\Pegawai;
use models\KartuDiskon;
use models\Produk;
use models\Pesanan;

if (isset($_POST['submit'])) {
    $data = [
        'status_bayar'          => 0,
        'anggota_id'     => $_POST['anggota_id'],
        'produk_id' => $_POST['produk_id'],
        'tanggal' => $_POST['tanggal'],
        'jumlah' => $_POST['jumlah'],
    ];

    $data = Pesanan::create($data);
    header('Location: list-pesanan.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Project 01</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include_once 'partials/navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once 'partials/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="list-pesanan.php">Pesanan</a></li>
                        <li class="breadcrumb-item active">Tambah Pesanan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Pesanan
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="anggota_id" class="form-label">Anggota</label>
                                    <select class="form-select" id="anggota_id" name="anggota_id" required>
                                        <option value="" disabled selected>Pilih Anggota</option>
                                        <?php
                                        $anggota = Anggota::get();
                                        foreach ($anggota as $a) {
                                            echo "<option value='{$a['id']}'>{$a['nama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="produk_id" class="form-label">Produk</label>
                                    <select class="form-select" id="produk_id" name="produk_id" required>
                                        <option value="" disabled selected>Pilih Produk</option>
                                        <?php
                                        $produk = Produk::get();
                                        foreach ($produk as $p) {
                                            echo "<option value='{$p['id']}'>{$p['nama']} - Rp. {$p['harga']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" min="1" class="form-control" id="jumlah" name="jumlah" required>
                                </div>

                                <a href="list-pesanan.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once 'partials/footer.php'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/datatables-simple-demo.js"></script>
</body>

</html>