<?php
include 'koneksi.php'; // Pastikan ini file koneksi ke database

$kode_cs = mysqli_real_escape_string($conn, $_GET['kode_cs']);

// Cek status pembayaran di database
$query = mysqli_query($conn, "SELECT status FROM transaksi WHERE kode_customer = '$kode_cs'");
$data = mysqli_fetch_assoc($query);

if ($data && $data['status'] === 'PAID') {
    echo 'PAID'; // Mengirimkan respon ke AJAX
} else {
    echo 'PENDING'; // Status masih menunggu
}
?>
