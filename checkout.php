<?php 
include 'header.php';
$kd = mysqli_real_escape_string($conn,$_GET['kode_cs']);
$cs = mysqli_query($conn, "SELECT * FROM customer WHERE kode_customer = '$kd'");
$rows = mysqli_fetch_assoc($cs);
?>

<div class="container py-5">
    <h2 class="border-bottom border-4 border-primary pb-2"><b>Checkout</b></h2>

    <div class="row mt-4">
        <!-- Kolom Daftar Pesanan -->
        <div class="col-lg-6">
            <h4>🛒 Daftar Pesanan</h4>
            <div class="card shadow-sm p-3">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $result = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kd'");
                        $no = 1;
                        $hasil = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $total = $row['harga'] * $row['qty'];
                            $hasil += $total;
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td>Rp.<?= number_format($row['harga']); ?></td>
                                <td><?= $row['qty']; ?></td>
                                <td>Rp.<?= number_format($total); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr class="table-warning">
                            <td colspan="5" class="text-end fw-bold">Grand Total: Rp.<?= number_format($hasil); ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Kolom Pembayaran QRIS -->
        <div class="col-lg-6">
            <h4>💰 Pembayaran QRIS</h4>
            <div class="card shadow-sm text-center p-4">
                <img src="images.png" alt="QRIS Payment" class="img-fluid mx-auto d-block" style="max-width: 50%;">
                <p class="mt-3">Silakan scan QR Code di atas untuk melakukan pembayaran.</p>
                <p id="status_pembayaran" class="fw-bold text-danger animate-blink">Menunggu pembayaran...</p>
            </div>
        </div>
    </div>

    <!-- Form Checkout -->
    <div class="card shadow-sm mt-4 p-4">
        <h4>📋 Formulir Pengiriman</h4>
        <form action="proses/order.php" method="POST">
            <input type="hidden" name="kode_cs" value="<?= $kd; ?>">

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $rows['nama']; ?>" readonly>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Provinsi</label>
                    <input type="text" class="form-control" name="prov" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" class="form-control" name="kota" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="almt" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" name="kopos" required>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="keranjang.php" class="btn btn-danger">❌ Batal</a>
                <button type="submit" class="btn btn-success">🛍️ Order Sekarang</button>
            </div>
        </form>
    </div>
</div>

<!-- Tambahkan efek animasi -->
<style>
    .animate-blink {
        animation: blink 1.5s infinite;
    }
    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0.5; }
        100% { opacity: 1; }
    }
</style>

<!-- AJAX untuk Cek Pembayaran -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function cekPembayaran() {
        $.ajax({
            url: 'check_payment.php',
            type: 'GET',
            data: { kode_cs: '<?= $kd; ?>' },
            success: function(response) {
                if (response === 'PAID') {
                    $('#status_pembayaran').removeClass('text-danger animate-blink').addClass('text-success').text('Pembayaran berhasil! Mengarahkan...');
                    setTimeout(() => window.location.href = 'proses/order.php?kode_cs=<?= $kd; ?>', 3000);
                }
            }
        });
    }

    setInterval(cekPembayaran, 5000);
</script>

<?php include 'footer.php'; ?>
