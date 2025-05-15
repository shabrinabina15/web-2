<?php
require_once __DIR__ . '/../models/Produk.php';
require_once __DIR__ . '/../models/JenisProduk.php';

use models\Produk;
use models\JenisProduk;

if (!isset($_GET['id'])) {
    header('Location: list-produk.php');
    exit;
}

$produk = Produk::find($_GET['id']);

if (!$produk) {
    header('Location: list-produk.php');
    exit;
}

if (isset($_POST['submit'])) {
    $id = $produk['id'];
    $data = [
        'kode'          => $_POST['kode'],
        'nama'          => $_POST['nama'],
        'deskripsi'     => $_POST['deskripsi'],
        'harga'         => $_POST['harga'],
        'stok'          => $_POST['stok'],
        'jenis_produk_id' => $_POST['jenis_produk_id'],
    ];

    $data = Produk::update($data, $id);
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
    <?php include_once 'partials/navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once 'partials/sidebar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Produk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="list-produk.php">Produk</a></li>
                        <li class="breadcrumb-item active">Edit Produk</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Produk
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="kode" class="form-label">Kode</label>
                                    <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $produk['kode'] ?>" required />
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $produk['nama'] ?>" required />
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5" required><?php echo $produk['deskripsi'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" min="500" step="500" value="<?php echo $produk['harga'] ?>" required />
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" class="form-control" id="stok" name="stok" min="0" value="<?php echo $produk['stok'] ?>" required />
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Jenis Produk</label>
                                    <select name="jenis_produk_id" id="jenis_produk_id" class="form-control">
                                        <option value="" disabled selected>Pilih Jenis Produk</option>
                                        <?php
                                        $jenis_produk = JenisProduk::get();
                                        foreach ($jenis_produk as $jp) {
                                            echo "<option value='{$jp['id']}'>{$jp['nama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <a href="list-produk.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
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