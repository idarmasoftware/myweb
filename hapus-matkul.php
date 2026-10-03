<?php
require_once("koneksi.php");

$kode = isset($_GET['kode']) ? $_GET['kode'] : '';

if ($kode) {
    $stmt = $koneksi->prepare("DELETE FROM mata_kuliah WHERE kode = :kode");
    $stmt->bindParam(':kode', $kode);
    $stmt->execute();
}

header("Location: mata-kuliah.php");
exit;
?>
