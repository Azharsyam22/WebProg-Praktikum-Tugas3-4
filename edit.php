<?php
require 'connection.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE mahasiswa SET npm=?, nama=?, jurusan=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$_POST['npm'], $_POST['nama'], $_POST['jurusan'], $id])) {
        header("Location: index.php"); exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow p-4" style="width: 400px;">
        <h4 class="text-center mb-4 text-warning">Edit Data</h4>
        <form method="POST">
            <div class="mb-3"><label class="form-label">NPM</label><input type="text" name="npm" class="form-control" value="<?= $data['npm'] ?>" required></div>
            <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required></div>
            <div class="mb-4"><label class="form-label">Jurusan</label><input type="text" name="jurusan" class="form-control" value="<?= $data['jurusan'] ?>" required></div>
            <button type="submit" class="btn btn-warning w-100 mb-2 fw-bold">Update Data</button>
            <a href="index.php" class="btn btn-outline-secondary w-100">Batal</a>
        </form>
    </div>
</body>
</html>