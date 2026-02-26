<?php
require 'connection.php';
$stmt = $pdo->prepare("DELETE FROM mahasiswa WHERE id = ?");
if ($stmt->execute([$_GET['id']])) {
    header("Location: index.php"); exit;
}
?>