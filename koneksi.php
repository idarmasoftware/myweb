<?php
// 1. Konfigurasi Database
$host     = "localhost";        // Host server database (biasanya localhost)
$dbname   = "myweb"; // Ganti dengan nama database Anda
$username = "root";             // Username database Anda
$password = "";                 // Password database Anda (kosongkan jika bawaan XAMPP)

try {
    // 2. Membuat Data Source Name (DSN)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    
    // 3. Membuat objek koneksi PDO
    $koneksi = new PDO($dsn, $username, $password);
    
    // 4. Mengatur error mode PDO ke Exception untuk mempermudah debugging
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Opsional: Mengubah fetch mode bawaan menjadi objek atau array asosiatif
    $koneksi->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Hapus tanda komentar di bawah jika ingin menguji saat pertama kali setup
    // echo "Koneksi ke database berhasil!"; 
    
} catch (PDOException $e) {
    // 5. Menangani jika terjadi error saat koneksi gagal
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
