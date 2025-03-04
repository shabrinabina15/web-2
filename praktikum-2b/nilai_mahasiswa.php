<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nama = $_GET['nama'];
    $matkul = $_GET['matkul'];
    $nilai_uts = $_GET['nilai_uts'];
    $nilai_uas = $_GET['nilai_uas'];
    $nilai_tugas = $_GET['nilai_tugas'];

    // Hitung nilai akhir
    $nilai_akhir = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

    // Menentukan status lulus atau tidak
    $status = ($nilai_akhir > 55) ? "Lulus" : "Tidak Lulus";

    // Menentukan grade nilai
    if ($nilai_akhir >= 85) {
        $grade = "A";
    } elseif ($nilai_akhir >= 70) {
        $grade = "B";
    } elseif ($nilai_akhir >= 56) {
        $grade = "C";
    } elseif ($nilai_akhir >= 36) {
        $grade = "D";
    } else {
        $grade = "E";
    }

    // Menentukan predikat dengan SWITCH
    switch ($grade) {
        case "A": $predikat = "Sangat Memuaskan"; break;
        case "B": $predikat = "Memuaskan"; break;
        case "C": $predikat = "Cukup"; break;
        case "D": $predikat = "Kurang"; break;
        case "E": $predikat = "Sangat Kurang"; break;
        default: $predikat = "Tidak Ada";
    }

    // Menampilkan hasil
    echo "<h2>Hasil Penilaian</h2>";
    echo "Nama: $nama <br>";
    echo "Mata Kuliah: $matkul <br>";
    echo "Nilai Akhir: " . number_format($nilai_akhir, 2) . "<br>";
    echo "Status: $status <br>";
    echo "Grade: $grade <br>";
    echo "Predikat: $predikat <br>";
}
?>
