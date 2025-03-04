<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    // Daftar harga produk
    $harga_produk = [
        "TV" => 4000000,
        "Kulkas" => 3500000,
        "Mesin Cuci" => 2000000
    ];

    // Menghitung total harga
    if (isset($harga_produk[$produk])) {
        $total_harga = $harga_produk[$produk] * $jumlah;

        // Menampilkan hasil belanja
        echo "<h2>Struk Belanja</h2>";
        echo "Nama Pelanggan: $nama <br>";
        echo "Produk: $produk <br>";
        echo "Jumlah: $jumlah <br>";
        echo "Total Harga: Rp " . number_format($total_harga, 0, ',', '.') . "<br>";
    } else {
        echo "Produk tidak ditemukan!";
    }
}
?>
