<?php
// etiket.php

// Inisialisasi variabel untuk menentukan tab aktif secara default.
// Misalnya, jika tidak ada submit dari form, aktifkan tab "qris".
$activeTab = "qris";

// Variabel untuk proses pembayaran dan penukaran sampah
$paymentConfirmed = false;
$pointsEarned = 0;
$discount = 0;
$plasticAmount = 0;

// Proses form submission untuk pembayaran QRIS dan penukaran sampah plastik
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['confirm_payment'])) {
        $activeTab = "qris";
        $paymentConfirmed = true;
    }
    if (isset($_POST['redeem_plastic']) && is_numeric($_POST['plastic_amount'])) {
        $activeTab = "sampah";
        $plasticAmount = (float)$_POST['plastic_amount'];
        // Contoh perhitungan: 10 poin per unit sampah plastik
        $pointsEarned = $plasticAmount * 10;
        // Contoh diskon: Rp5.000 per 10 poin
        $discount = ($pointsEarned / 10) * 5000;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pantai Galung</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
    }
    .nav-tabs .nav-link.active {
      background-color: #0d6efd;
      color: #fff;
    }
    .tab-content {
      margin-top: 20px;
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
    .card-header {
      background-color:rgb(67, 142, 255);
      color: #fff;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .btn-custom {
      background-color: #28a745;
      color: #fff;
      border-radius: 50px;
    }
    .btn-custom:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
<div class="container my-5">
  <h1 class="text-center mb-4">PANTAI GALUNG</h1>
  <!-- Nav Tabs -->
  <ul class="nav nav-tabs" id="etiketTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link <?php if($activeTab=="qris") echo "active"; ?>" id="qris-tab" data-bs-toggle="tab" data-bs-target="#qris" type="button" role="tab" aria-controls="qris" aria-selected="<?php echo ($activeTab=="qris" ? "true" : "false"); ?>">Pembayaran QRIS</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link <?php if($activeTab=="sampah") echo "active"; ?>" id="sampah-tab" data-bs-toggle="tab" data-bs-target="#sampah" type="button" role="tab" aria-controls="sampah" aria-selected="<?php echo ($activeTab=="sampah" ? "true" : "false"); ?>">Sampah Plastik</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link <?php if($activeTab=="tiket") echo "active"; ?>" id="tiket-tab" data-bs-toggle="tab" data-bs-target="#tiket" type="button" role="tab" aria-controls="tiket" aria-selected="<?php echo ($activeTab=="tiket" ? "true" : "false"); ?>">Penjualan Tiket</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link <?php if($activeTab=="etiket") echo "active"; ?>" id="etiket-tab" data-bs-toggle="tab" data-bs-target="#etiket" type="button" role="tab" aria-controls="etiket" aria-selected="<?php echo ($activeTab=="etiket" ? "true" : "false"); ?>">Etika Transaksi</button>
    </li>
  </ul>
  
  <!-- Tab Content -->
  <div class="tab-content" id="etiketTabContent">
    <!-- Pembayaran QRIS Tab -->
    <div class="tab-pane fade <?php if($activeTab=="qris") echo "show active"; ?>" id="qris" role="tabpanel" aria-labelledby="qris-tab">
      <div class="card">
        <div class="card-header">
          <h3><i class="fas fa-qrcode"></i> Pembayaran QRIS</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <!-- Instruksi pembayaran -->
            <div class="col-lg-8">
              <p>Pilih metode pembayaran “QRIS” saat melakukan transaksi. Arahkan kamera ponsel ke kode QR yang telah disediakan di sebelah kanan halaman checkout.</p>
              <p>Ikuti instruksi pada aplikasi perbankan atau dompet digital untuk menyelesaikan pembayaran. Setelah pembayaran terkonfirmasi, pelanggan akan menerima notifikasi melalui email/SMS.</p>
              <p><strong>Keamanan Transaksi:</strong> Setiap transaksi melalui QRIS dilindungi oleh sistem enkripsi yang ketat sehingga data pribadi dan keuangan Anda aman.</p>
              <form method="post" class="mt-3">
                <button type="submit" name="confirm_payment" class="btn btn-custom btn-lg">Saya Sudah Melakukan Pembayaran</button>
              </form>
              <?php if ($paymentConfirmed): ?>
                <div class="alert alert-success mt-3">
                  Pembayaran telah dikonfirmasi. Notifikasi telah dikirim melalui email/SMS.
                </div>
              <?php endif; ?>
            </div>
            <!-- Gambar QRIS -->
            <div class="col-lg-4 text-center">
              <img src="images.png" alt="QR Code" class="img-fluid rounded">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Sampah Plastik Tab -->
    <div class="tab-pane fade <?php if($activeTab=="sampah") echo "show active"; ?>" id="sampah" role="tabpanel" aria-labelledby="sampah-tab">
      <div class="card">
        <div class="card-header">
          <h3><i class="fas fa-recycle"></i> Program Daur Ulang Sampah Plastik</h3>
        </div>
        <div class="card-body">
          <p>Pelanggan dapat menyetor sampah plastik yang telah dipilah melalui mitra resmi kami. Setiap penyerahan sampah plastik akan mendapatkan poin yang dapat dikonversikan menjadi diskon atau cashback pada transaksi berikutnya.</p>
          <p>Proses penukaran poin dilakukan secara transparan melalui akun pelanggan di situs kami.</p>
          <form method="post" class="mt-3">
            <div class="mb-3">
              <label for="plastic_amount" class="form-label">Masukkan jumlah sampah plastik yang disetor (dalam unit):</label>
              <input type="number" step="any" name="plastic_amount" id="plastic_amount" class="form-control" placeholder="Contoh: 5" required>
            </div>
            <button type="submit" name="redeem_plastic" class="btn btn-primary btn-lg">Tukar Sampah Plastik dengan Poin</button>
          </form>
          <?php if ($pointsEarned > 0): ?>
            <div class="alert alert-info mt-3">
              Anda telah mendapatkan <strong><?php echo $pointsEarned; ?></strong> poin. Diskon untuk transaksi berikutnya adalah sebesar <strong>Rp <?php echo number_format($discount, 0, ',', '.'); ?></strong>.
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    
    <!-- Penjualan Tiket Tab -->
    <div class="tab-pane fade <?php if($activeTab=="tiket") echo "show active"; ?>" id="tiket" role="tabpanel" aria-labelledby="tiket-tab">
      <div class="card">
        <div class="card-header">
          <h3><i class="fas fa-ticket-alt"></i> Penjualan Paving Block</h3>
        </div>
        <div class="card-body">
          <p>Untuk pembelian paving block acara, pelanggan dapat memilih tiket yang diinginkan melalui halaman penjualan tiket kami.</p>
          <ol>
            <li>Pilih acara dan jumlah tiket yang ingin dibeli.</li>
            <li>Klik tombol "Beli Tiket" untuk melihat detail pesanan.</li>
            <li>Lakukan pembayaran menggunakan metode QRIS. Arahkan kamera ponsel ke QR Code yang ditampilkan.</li>
            <li>Setelah pembayaran terkonfirmasi, tiket elektronik akan dikirim melalui email atau dapat diunduh dari akun Anda.</li>
            <li>Pastikan untuk memeriksa email dan folder spam jika tiket tidak muncul dalam 15 menit.</li>
          </ol>
          <p><strong>Keamanan:</strong> Transaksi tiket juga dijamin keamanannya dengan sistem enkripsi yang ketat.</p>
          <p><strong>Diskon Tambahan:</strong> Jika Anda juga berpartisipasi dalam program penukaran sampah plastik, Anda berhak mendapatkan potongan harga tambahan untuk pembelian tiket.</p>
          <!-- Tombol atau link untuk membeli tiket dapat ditambahkan di sini -->
          <a href="produk.php" class="btn btn-custom btn-lg">Beli Tiket Sekarang</a>

        </div>
      </div>
    </div>
    
    <!-- Etika Transaksi Tab -->
    <div class="tab-pane fade <?php if($activeTab=="etiket") echo "show active"; ?>" id="etiket" role="tabpanel" aria-labelledby="etiket-tab">
  <div class="card">
    <div class="card-header">
      <h3><i class="fas fa-handshake"></i> Etika Transaksi</h3>
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <strong>Kepatuhan:</strong> Pelanggan diharapkan membaca dan memahami syarat & ketentuan sebelum bertransaksi.
        </li>
        <li class="list-group-item">
          <strong>Kejujuran & Keterbukaan:</strong> Informasi produk, transaksi, dan program harus disampaikan secara jelas dan tidak menyesatkan.
        </li>
        <li class="list-group-item">
          <strong>Tanggung Jawab Sosial:</strong> Berpartisipasi dalam program daur ulang sampah plastik dan penjualan tiket sebagai wujud kepedulian terhadap lingkungan.
        </li>
        <li class="list-group-item">
          <strong>Komunikasi:</strong> Hubungi layanan pelanggan kami untuk pertanyaan atau klarifikasi. Kami berkomitmen memberikan respon cepat dan solutif.
        </li>
      </ul>
    </div>
  </div>
</div>


<!-- Bootstrap 5 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
