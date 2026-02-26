<?php
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$_POST['npm'], $_POST['nama'], $_POST['jurusan']])) {
        header("Location: index.php"); exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow p-4" style="width: 400px;">
        <h4 class="text-center mb-4 text-primary">Tambah Mahasiswa</h4>
        <form method="POST">
            <div class="mb-3"><label class="form-label fw-bold">NPM</label><input type="text" name="npm" class="form-control" required></div>
            <div class="mb-3"><label class="form-label fw-bold">Nama Lengkap</label><input type="text" name="nama" class="form-control" required></div>
            <div class="mb-4"><label class="form-label fw-bold">Jurusan</label><input type="text" name="jurusan" class="form-control" required></div>
            <button type="submit" class="btn btn-success w-100 mb-2">Simpan Data</button>
            <a href="index.php" class="btn btn-outline-secondary w-100">Batal</a>
        </form>
    </div>
</body>
</html>