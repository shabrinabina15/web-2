<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-light">
                <h6 class="mb-0">Sistem Penilaian</h6>
            </div>
            <div class="card-body">
                <h4 class="card-title border-bottom pb-2 mb-4">Form Nilai Siswa</h4>
                <form>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label text-end fw-bold">Nama Lengkap</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label text-end fw-bold">Mata Kuliah</label>
                        <div class="col-md-6">
                            <select class="form-select">
                                <option>Dasar Dasar Pemrograman</option>
                                <option>Pemrograman Web</option>
                                <option>Basis Data</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label text-end fw-bold">Nilai UTS</label>
                        <div class="col-md-3">
                            <input class="form-control" placeholder="Nilai UTS">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label text-end fw-bold">Nilai UAS</label>
                        <div class="col-md-3">
                            <input class="form-control" placeholder="Nilai UAS">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label text-end fw-bold">Nilai Tugas/Praktikum</label>
                        <div class="col-md-3">
                            <input class="form-control" placeholder="Nilai Tugas">
                        </div>
                    </div>
                    <div class="text-center col-md-7">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
