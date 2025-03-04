<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">Belanja Online</div>
            <div class="card-body">
                <form action="form_belanja.php" method="POST">
                    <div class="mb-3">
                        <label for="customer" class="form-label">Customer</label>
                        <input type="text" class="form-control" id="customer" name="customer" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilih Produk</label><br>
                        <input type="radio" name="produk" value="TV" required> TV
                        <input type="radio" name="produk" value="Kulkas"> KULKAS
                        <input type="radio" name="produk" value="Mesin Cuci"> MESIN CUCI
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <button type="submit" class="btn btn-success">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $customer = $_POST['customer'];
        $produk = $_POST['produk'];
        $jumlah = $_POST['jumlah'];
        
        $harga = [
            "TV" => 4200000,
            "Kulkas" => 3100000,
            "Mesin Cuci" => 3800000
        ];
        
        $total = $harga[$produk] * $jumlah;
        
        echo "<div class='container mt-3'><div class='alert alert-info'>";
        echo "<p>Nama Customer : $customer</p>";
        echo "<p>Produk Pilihan : $produk</p>";
        echo "<p>Jumlah Beli : $jumlah</p>";
        echo "<p>Total Belanja : Rp. " . number_format($total, 0, ',', '.') . "</p>";
        echo "</div></div>";
    }
    ?>

</body>
</html>
