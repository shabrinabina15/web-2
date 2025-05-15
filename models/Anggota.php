<?php

namespace models;

require_once __DIR__ . '../../config/Connection.php';

use config\Connection;
use PDO;

class Anggota
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = "SELECT 
                    pegawai.nip,
                    pegawai.nama,
                    kartu_diskon.nama AS kartu_diskon,
                    anggota.status_aktif,
                    anggota.id,
                    anggota.pegawai_id,
                    anggota.kartu_diskon_id
                FROM 
                    anggota
                JOIN
                    pegawai ON anggota.pegawai_id = pegawai.id
                JOIN
                    kartu_diskon ON anggota.kartu_diskon_id = kartu_diskon.id";
        $statement = $pdo->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = "INSERT INTO anggota (status_aktif, pegawai_id, kartu_diskon_id) VALUES (:status_aktif, :pegawai_id, :kartu_diskon_id)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':status_aktif', $data['status_aktif']);
        $statement->bindParam(':pegawai_id', $data['pegawai_id']);
        $statement->bindParam(':kartu_diskon_id', $data['kartu_diskon_id']);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = "SELECT 
                    pegawai.nip,
                    pegawai.nama,
                    kartu_diskon.nama as kartu_diskon,
                    kartu_diskon.persen_diskon as diskon,
                    anggota.status_aktif,
                    anggota.id,
                    anggota.pegawai_id,
                    anggota.kartu_diskon_id
                FROM 
                    anggota
                JOIN
                    pegawai ON anggota.pegawai_id = pegawai.id
                JOIN
                    kartu_diskon ON anggota.kartu_diskon_id = kartu_diskon.id
                WHERE 
                    anggota.id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    public static function update($data, $id)
    {
        $pdo = Connection::make();
        $sql = "UPDATE anggota SET status_aktif = :status_aktif WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':status_aktif', $data['status_aktif']);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::make();
        $sql = "DELETE FROM anggota WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
}