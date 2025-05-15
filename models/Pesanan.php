<?php

namespace models;

require_once __DIR__ . '../../config/Connection.php';
require_once __DIR__ . '/Produk.php';

use config\Connection;
use PDO;
use models\Produk;

class Pesanan
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = "SELECT 
                    pesanan.id,
                    pesanan.tanggal,
                    pembayaran.jumlah_bayar,
                    pesanan.status_bayar,
                    pegawai.nama
                FROM 
                    pesanan
                JOIN
                    anggota ON pesanan.anggota_id = anggota.id
                JOIN
                    detail_pesanan ON pesanan.id = detail_pesanan.pesanan_id
                JOIN
                    pegawai ON anggota.pegawai_id = pegawai.id
                JOIN
                    produk ON detail_pesanan.produk_id = produk.id
                JOIN 
                    pembayaran ON pesanan.id = pembayaran.pesanan_id";
        $statement = $pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = "INSERT INTO pesanan (tanggal, diskon, status_bayar, anggota_id) VALUES (:tanggal, :diskon, :status_bayar, :anggota_id)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':tanggal', $data['tanggal']);
        $statement->bindParam(':diskon', $data['diskon']);
        $statement->bindParam(':status_bayar', $data['status_bayar']);
        $statement->bindParam(':anggota_id', $data['anggota_id']);
        $statement->execute();

        $pesanan_id = $pdo->lastInsertId();

        $sql = "INSERT INTO detail_pesanan (pesanan_id, produk_id, jumlah) VALUES (:pesanan_id, :produk_id, :jumlah)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':pesanan_id', $pesanan_id);
        $statement->bindParam(':produk_id', $data['produk_id']);
        $statement->bindParam(':jumlah', $data['jumlah']);
        $statement->execute();

        $produk = Produk::find($data['produk_id']);
        $anggota = Anggota::find($data['anggota_id']);

        $data['jumlah_bayar'] = $data['jumlah'] * $produk['harga'];
        $data['jumlah_bayar'] = $data['jumlah_bayar'] - ($data['jumlah_bayar'] * ($anggota['diskon'] / 100));

        $sql = "INSERT INTO pembayaran (jumlah_bayar, pesanan_id) VALUES (:jumlah_bayar, :pesanan_id)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':jumlah_bayar', $data['jumlah_bayar']);
        $statement->bindParam(':pesanan_id', $pesanan_id);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = "SELECT 
                    pesanan.id,
                    pesanan.tanggal,
                    pegawai.nama,
                    produk.nama AS produk,
                    produk.harga,
                    detail_pesanan.jumlah,
                    kartu_diskon.persen_diskon,
                    pembayaran.jumlah_bayar,
                    pembayaran.tanggal as tgl_bayar,
                    pesanan.status_bayar
                FROM 
                    pesanan
                JOIN
                    anggota ON pesanan.anggota_id = anggota.id
                JOIN
                    detail_pesanan ON pesanan.id = detail_pesanan.pesanan_id
                JOIN
                    pegawai ON anggota.pegawai_id = pegawai.id
                JOIN
                    kartu_diskon ON anggota.kartu_diskon_id = kartu_diskon.id
                JOIN
                    produk ON detail_pesanan.produk_id = produk.id
                JOIN 
                    pembayaran ON pesanan.id = pembayaran.pesanan_id
                WHERE 
                    pesanan.id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $sql = "DELETE FROM detail_pesanan WHERE pesanan_id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $sql = "DELETE FROM pembayaran WHERE pesanan_id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $sql = "DELETE FROM pesanan WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }

    public static function updatePembayaran($id, $status)
    {
        $pdo = Connection::make();
        $sql = "UPDATE pesanan SET status_bayar = :status WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $tanggal = date('Y-m-d');

        $sql = "UPDATE pembayaran SET tanggal = :tanggal WHERE pesanan_id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':tanggal', $tanggal);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}
