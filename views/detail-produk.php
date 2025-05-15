<?php
require_once __DIR__ . '/../models/Produk.php';

use models\Produk;

if (!isset($_GET['id'])) {
    header('Location: list-produk.php');
    exit;
}

$produk = Produk::find($_GET['id']);

if (!$produk) {
    header('Location: list-produk.php');
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
        <?php include_once 'partials/navbar.php'?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include_once 'partials/sidebar.php'?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Detail Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="list-produk.php">Produk</a></li>
                            <li class="breadcrumb-item active">Detail Produk</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Detail Produk
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama</th>
                                        <td><?php echo $produk['kode'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?php echo $produk['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td><?php echo $produk['deskripsi'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td><?php echo $produk['harga'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <td><?php echo $produk['stok'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Produk</th>
                                        <td><?php echo $produk['jenis_produk'] ?></td>
                                    </tr>
                                </table>
                                <div class="mt-3">
                                    <a href="list-produk.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                                    <a href="edit-produk.php?id=<?php echo $produk['id'] ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="delete-produk.php?id=<?php echo $produk['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include_once 'partials/footer.php'?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../public/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../public/js/datatables-simple-demo.js"></script>
    </body>
</html>
