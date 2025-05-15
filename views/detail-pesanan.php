<?php
require_once __DIR__ . '/../models/Pesanan.php';

use models\Pesanan;

if (!isset($_GET['id'])) {
    header('Location: list-pesanan.php');
    exit;
}

$pesanan = Pesanan::find($_GET['id']);

if (!$pesanan) {
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
        <div id="layoutSidenav_nav">
            <?php include_once 'partials/sidebar.php' ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Detail Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="list-pesanan.php">Pesanan</a></li>
                        <li class="breadcrumb-item active">Detail Pesanan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Detail Pesanan
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Tanggal Pemesanan</th>
                                    <td><?php echo $pesanan['tanggal'] ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Pemesan</th>
                                    <td><?php echo $pesanan['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Produk</th>
                                    <td><?php echo $pesanan['produk'] ?></td>
                                </tr>
                                <tr>
                                    <th>Harga Produk</th>
                                    <td><?php echo $pesanan['harga'] ?></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Pesanan</th>
                                    <td><?php echo $pesanan['jumlah'] ?></td>
                                </tr>
                                <tr>
                                    <th>Diskon Anggota</th>
                                    <td><?php echo $pesanan['persen_diskon'] ?></td>
                                </tr>
                                <tr>
                                    <th>Total Harga</th>
                                    <td><?php echo $pesanan['jumlah_bayar'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pembayaran</th>
                                    <td><?php echo $pesanan['tgl_bayar'] ?></td>
                                </tr>
                                <tr>
                                    <th>Status Pembayaran</th>
                                    <td><?php echo $pesanan['status_bayar'] ?></td>
                                </tr>
                            </table>
                            <div class="mt-3">
                                <a href="list-pesanan.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                                <a href="edit-pesanan.php?id=<?php echo $pesanan['id'] ?>" class="btn btn-info"><i class="fas fa-edit"></i> Bayar</a>
                                <a href="delete-pesanan.php?id=<?php echo $pesanan['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once 'partials/footer.php' ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/datatables-simple-demo.js"></script>
</body>

</html>