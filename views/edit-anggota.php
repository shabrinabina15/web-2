<?php
    require_once __DIR__ . '/../models/Anggota.php';

    use models\Anggota;

    
    if (!isset($_GET['id'])) {
        header('Location: list-anggota.php');
        exit;
    }
    
    $anggota = Anggota::find($_GET['id']);
    
    if (!$anggota) {
        header('Location: list-anggota.php');
        exit;
    }

    if($anggota['status_aktif'] == 1){
        $anggota['status_aktif'] = 0;
    }else{
        $anggota['status_aktif'] = 1;
    }

    $data = [
        'status_aktif' => $anggota['status_aktif']
    ];
    
    Anggota::update( $data, $anggota['id']);
    header('Location: list-anggota.php');