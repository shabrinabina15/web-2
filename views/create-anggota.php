<?php
require_once __DIR__ . '/../models/Anggota.php';
require_once __DIR__ . '/../models/Pegawai.php';
require_once __DIR__ . '/../models/KartuDiskon.php';

use models\Anggota;
use models\Pegawai;
use models\KartuDiskon;

if (isset($_POST['submit'])) {
    $data = [
        'status_aktif'          => TRUE,
        'pegawai_id'     => $_POST['pegawai_id'],
        'kartu_diskon_id' => $_POST['kartu_diskon_id'],
    ];

    $data = Anggota::create($data);
    header('Location: list-anggota.php');
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
                    <h1 class="mt-4">Tambah Anggota</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="list-anggota.php">Anggota</a></li>
                        <li class="breadcrumb-item active">Tambah Anggota</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Anggota
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="pegawai_id" class="form-label">Pegawai</label>
                                    <select class="form-control" name="pegawai_id" id="pegawai_id">
                                        <option value="" disabled selected>Pilih Pegawai</option>
                                        <?php
                                        $pegawai = Pegawai::get();
                                        foreach ($pegawai as $row) {
                                            echo "<option value='{$row['id']}'>{$row['nama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kartu_diskon_id" class="form-label">Kartu Diskon</label>
                                    <select class="form-control" name="kartu_diskon_id" id="kartu_diskon_id">
                                        <option value="" disabled selected>Pilih Kartu Diskon</option>
                                        <?php
                                        $kartu_diskon = KartuDiskon::get();
                                        foreach ($kartu_diskon as $row) {
                                            echo "<option value='{$row['id']}'>{$row['nama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <a href="list-anggota.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
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