<?php
// tracking.php

// Simulasi data pelacakan pesanan
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : '123456';

$orderTracking = [
    [
        'status' => 'Pesanan Dibuat',
        'timestamp' => '2025-03-01 10:00:00',
        'icon' => 'fa-shopping-cart'
    ],
    [
        'status' => 'Pesanan Diproses',
        'timestamp' => '2025-03-01 12:00:00',
        'icon' => 'fa-box-open'
    ],
    [
        'status' => 'Barang Dikirim',
        'timestamp' => '2025-03-02 09:00:00',
        'icon' => 'fa-truck'
    ],
    [
        'status' => 'Dalam Perjalanan',
        'timestamp' => '2025-03-02 15:00:00',
        'icon' => 'fa-road'
    ],
    [
        'status' => 'Terkirim',
        'timestamp' => '2025-03-03 08:30:00',
        'icon' => 'fa-check-circle'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pelacakan Pesanan - [Nama Toko Anda]</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }
    .timeline {
      position: relative;
      max-width: 800px;
      margin: 0 auto;
      padding: 40px 0;
    }
    .timeline::after {
      content: '';
      position: absolute;
      width: 6px;
      background-color: #0d6efd;
      top: 0;
      bottom: 0;
      left: 50%;
      margin-left: -3px;
    }
    .timeline-item {
      padding: 20px 30px;
      position: relative;
      width: 50%;
    }
    .timeline-item.left {
      left: 0;
    }
    .timeline-item.right {
      left: 50%;
    }
    .timeline-item::after {
      content: "";
      position: absolute;
      width: 25px;
      height: 25px;
      top: 15px;
      background-color: white;
      border: 4px solid #0d6efd;
      border-radius: 50%;
      z-index: 1;
    }
    .timeline-item.left::after {
      right: -13px;
    }
    .timeline-item.right::after {
      left: -13px;
    }
    .timeline-content {
      padding: 20px;
      background-color: white;
      position: relative;
      border-radius: 6px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
    .timeline-content h5 {
      margin-top: 0;
      color: #0d6efd;
    }
    .timeline-content p {
      margin: 0;
    }
    @media screen and (max-width: 600px) {
      .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 25px;
      }
      .timeline-item.right {
        left: 0%;
      }
      .timeline-item.left::after, .timeline-item.right::after {
        left: 60px;
      }
    }
  </style>
</head>
<body>
<div class="container my-5">
  <h1 class="text-center mb-4">Pelacakan Pesanan</h1>
  <p class="text-center">Order ID: <?php echo htmlspecialchars($order_id); ?></p>
  <div class="timeline">
    <?php foreach ($orderTracking as $index => $step): ?>
      <?php $side = ($index % 2 == 0) ? 'left' : 'right'; ?>
      <div class="timeline-item <?php echo $side; ?>">
        <div class="timeline-content">
          <h5><i class="fas <?php echo $step['icon']; ?>"></i> <?php echo $step['status']; ?></h5>
          <p><?php echo $step['timestamp']; ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
