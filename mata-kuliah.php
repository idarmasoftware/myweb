<?php

require_once("koneksi.php");

$stmt = $koneksi->prepare("SELECT * FROM mata_kuliah");
$stmt->execute();
$matkul = $stmt->fetchAll();

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mata Kuliah</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

  <div class="container mt-3">
    <div class="row">
      <div class="col-6">
        <h1>Daftar Mata Kuliah</h1>
      </div>
      <div class="col-6 text-end">
        <a class="btn btn-primary" href="tambah-matkul.php">Tambah Mata Kuliah</a>
      </div>
    </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode</th>
      <th scope="col">Nama Matkul</th>
      <th scope="col">Semester</th>
      <th scope="col">SKS</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $angka = 1 ?>
    <?php foreach($matkul as $data) :?>
    <tr>
      <td><?= $angka++ ?></td>
      <td><?= $data["kode"] ?></td>
      <td><?= $data["nama"] ?></td>
      <td><?= $data["semester"] ?></td>
      <td><?= $data["sks"] ?></td>
      <td>
        <a href="edit-matkul.php?kode=<?= urlencode($data["kode"]) ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="hapus-matkul.php?kode=<?= urlencode($data["kode"]) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>