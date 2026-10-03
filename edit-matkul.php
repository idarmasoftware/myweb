<?php
require_once("koneksi.php");

$kode = isset($_GET['kode']) ? $_GET['kode'] : '';

if (!$kode) {
    header("Location: mata-kuliah.php");
    exit;
}

// Ambil data yang akan diedit
$stmt = $koneksi->prepare("SELECT * FROM mata_kuliah WHERE kode = :kode");
$stmt->bindParam(':kode', $kode);
$stmt->execute();
$matkul = $stmt->fetch();

if (!$matkul) {
    echo "Data tidak ditemukan!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $semester = $_POST["semester"];
    $sks = $_POST["sks"];

    $updateStmt = $koneksi->prepare("UPDATE mata_kuliah SET nama = :nama, semester = :semester, sks = :sks WHERE kode = :kode");
    $updateStmt->bindParam(':nama', $nama);
    $updateStmt->bindParam(':semester', $semester);
    $updateStmt->bindParam(':sks', $sks);
    $updateStmt->bindParam(':kode', $kode);

    if ($updateStmt->execute()) {
        header("Location: mata-kuliah.php");
        exit;
    } else {
        $error = "Gagal mengupdate data.";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3">
        <h1>Edit Mata Kuliah</h1>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST" action="">
          <div class="mb-3">
            <label for="kode" class="form-label">Kode Mata Kuliah</label>
            <input type="text" class="form-control" id="kode" name="kode" value="<?= htmlspecialchars($matkul['kode']) ?>" disabled>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($matkul['nama']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="number" class="form-control" id="semester" name="semester" value="<?= htmlspecialchars($matkul['semester']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="number" class="form-control" id="sks" name="sks" value="<?= htmlspecialchars($matkul['sks']) ?>" required>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="mata-kuliah.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
