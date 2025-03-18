<?php 
include 'header.php';
?>

<style>
    .bs-acc {
        margin-top: 20px;
    }
    .accordion .card {
        border: none;
        border-radius: 8px;
        margin-bottom: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .accordion .card-header {
        background: #f8f9fa;
        border: none;
        padding: 12px 20px;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
    }
    .accordion .card-header:hover {
        background: #e9ecef;
    }
    .accordion .card-body {
        padding: 15px 20px;
        font-size: 14px;
        color: #333;
    }
</style>

<div class="container">
    <h2 class="text-center pb-2" style="border-bottom: 3px solid #007BFF;"><b>Manual Aplikasi</b></h2>
    <div class="bs-acc">
        <div class="accordion" id="manualAplikasi">
            
            <!-- Step 1 -->
            <div class="card">
                <div class="card-header" id="step1" data-toggle="collapse" data-target="#collapse1">
                    <i class="fas fa-user-plus"></i> Registrasi Akun
                </div>
                <div id="collapse1" class="collapse show" aria-labelledby="step1" data-parent="#manualAplikasi">
                    <div class="card-body">
                        Daftar atau login terlebih dahulu sebelum berbelanja. Klik tombol <b>Daftar</b>Sdi halaman utama dan isi data yang diperlukan.
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="card">
                <div class="card-header" id="step2" data-toggle="collapse" data-target="#collapse2">
                    <i class="fas fa-shopping-bag"></i> Pilih Produk
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="step2" data-parent="#manualAplikasi">
                    <div class="card-body">
                        Telusuri katalog dan pilih produk yang diinginkan. Klik tombol <b>Beli</b> atau <b>Tambahkan ke Keranjang</b>.
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="card">
                <div class="card-header" id="step3" data-toggle="collapse" data-target="#collapse3">
                    <i class="fas fa-credit-card"></i> Checkout & Pembayaran
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="step3" data-parent="#manualAplikasi">
                    <div class="card-body">
                        Masukkan alamat pengiriman dan pilih metode pembayaran yang tersedia. Setelah pembayaran berhasil, pesanan akan diproses.
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>
