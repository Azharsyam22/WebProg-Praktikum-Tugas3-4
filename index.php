<?php
require 'connection.php';
$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container bg-white p-4 shadow-sm rounded">
        <h3 class="mb-4 text-center text-primary fw-bold">Daftar Mahasiswa Universitas Siliwangi</h3>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Data Baru</a>
        
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-dark">
                <tr><th>No</th><th>NPM</th><th>Nama Lengkap</th><th>Jurusan</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($mahasiswa as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><span class="badge bg-secondary"><?= htmlspecialchars($row['npm']); ?></span></td>
                    <td class="text-start"><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['jurusan']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning fw-bold">Edit</a>
                        <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>