<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-3">
      <h1>Tambah Mata Kuliah</h1>
      <?php
      require_once("koneksi.php");
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $kode = $_POST["kode"];
          $nama = $_POST["nama"];
          $semester = $_POST["semester"];
          $sks = $_POST["sks"];

          $stmt = $koneksi->prepare("INSERT INTO mata_kuliah (kode, nama, semester, sks) VALUES (:kode, :nama, :semester, :sks)");
          $stmt->bindParam(':kode', $kode);
          $stmt->bindParam(':nama', $nama);
          $stmt->bindParam(':semester', $semester);
          $stmt->bindParam(':sks', $sks);

          if ($stmt->execute()) {
              echo "<div class='alert alert-success'>Data berhasil ditambahkan! <a href='mata-kuliah.php'>Kembali ke daftar</a></div>";
          } else {
              echo "<div class='alert alert-danger'>Gagal menambahkan data.</div>";
          }
      }
      ?>
      <form method="POST" action="">
        <div class="mb-3">
          <label for="kode" class="form-label">Kode Mata Kuliah</label>
          <input type="text" class="form-control" id="kode" name="kode" required>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Mata Kuliah</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="semester" class="form-label">Semester</label>
          <input type="number" class="form-control" id="semester" name="semester" required>
        </div>
        <div class="mb-3">
          <label for="sks" class="form-label">SKS</label>
          <input type="number" class="form-control" id="sks" name="sks" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="mata-kuliah.php" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>