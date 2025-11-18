<?php
// ===============================================================
// ASUMSI: Data backend sudah terisi, bagian bawah hanya layout
// ===============================================================

$paymentMethod = $_GET['method'] ?? 'bca'; 
$bankChosen = $_GET['bank'] ?? 'BCA'; 
$ewalletChosen = $_GET['ewallet'] ?? 'GoPay'; 

$paymentDetail = [
    'amount' => 'Rp 160.000',
    'due_time' => '17-10-2025 Pukul 23:59 WIB',
    'account_number' => '8097 000 123 456',
    'qrcode_url' => 'img/qris-placeholder.png',
];

// Tentukan judul dan ikon
$paymentTitle = '';
$paymentIcon = '';

if ($paymentMethod === 'bca') {
    $paymentTitle = 'Transfer Bank ' . $bankChosen;
    $paymentIcon = 'fas fa-university';
} elseif ($paymentMethod === 'qris') {
    $paymentTitle = 'Pembayaran QRIS';
    $paymentIcon = 'fas fa-qrcode';
} elseif (in_array($paymentMethod, ['gopay', 'ovo', 'dana', 'shopeepay'])) {
    $paymentMethod = 'ewallet';
    $paymentTitle = 'Dompet Digital (' . $ewalletChosen . ')';
    $paymentIcon = 'fas fa-wallet';
} elseif ($paymentMethod === 'cod') {
    $paymentTitle = 'Cash On Delivery (COD)';
    $paymentIcon = 'fas fa-money-bill-wave';
} else {
    $paymentTitle = 'Metode Pembayaran Tidak Dikenal';
    $paymentIcon = 'fas fa-exclamation-triangle';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>EShopper - Instruksi Pembayaran</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .payment-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .payment-header {
            background: #f5f5f5;
            padding: 20px;
            border-bottom: 2px solid #ddd;
        }
        .payment-header h4 {
            margin: 0;
            font-weight: 600;
        }
        .qris-box img {
            width: 220px;
            height: 220px;
            border: 3px solid #ccc;
            border-radius: 10px;
            padding: 5px;
            background: white;
        }
        .alert-custom {
            background: #fff3cd;
            border-left: 5px solid #ffc107;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include 'partials/topbar.php'; ?>
    <?php include 'partials/navbar.php'; ?> 

    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 250px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Instruksi Pembayaran</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Pembayaran</p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="payment-card">
                    <div class="payment-header text-center">
                        <h4><i class="<?php echo $paymentIcon; ?> mr-2"></i><?php echo $paymentTitle; ?></h4>
                    </div>

                    <div class="p-4">

                        <?php if ($paymentMethod !== 'cod'): ?>
                        <div class="alert alert-danger text-center">
                            <strong>Segera Lakukan Pembayaran!</strong>
                            <p>Total: <span class="h4 text-danger"><?php echo $paymentDetail['amount']; ?></span></p>
                            <p>Batas Akhir: <b><?php echo $paymentDetail['due_time']; ?></b></p>
                        </div>
                        <?php endif; ?>

                        <?php if ($paymentMethod === 'qris'): ?>
                            <div class="text-center">
                                <h5 class="mb-3 font-weight-bold">Langkah Pembayaran QRIS</h5>
                                <p>1. Buka aplikasi E-Wallet atau M-Banking Anda</p>
                                <p>2. Pilih menu “Scan QR” / “Pembayaran QR”</p>
                                <p>3. Arahkan kamera ke QR Code di bawah ini:</p>
                                <div class="qris-box mx-auto my-3">
                                    <img src="<?php echo $paymentDetail['qrcode_url']; ?>" alt="QRIS Code">
                                </div>
                                <p class="font-weight-bold">Nominal: <?php echo $paymentDetail['amount']; ?></p>
                            </div>

                        <?php elseif ($paymentMethod === 'bca'): ?>
                            <div>
                                <h5 class="font-weight-bold mb-3">Detail Transfer <?php echo $bankChosen; ?></h5>
                                <div class="p-3 bg-light rounded mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>No. Rekening:</span>
                                        <b><?php echo $paymentDetail['account_number']; ?></b>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Atas Nama:</span>
                                        <b>PT EShopper Indonesia</b>
                                    </div>
                                </div>
                                <h6>Langkah Transfer:</h6>
                                <ol class="small">
                                    <li>Masukkan nomor rekening di atas.</li>
                                    <li>Transfer sesuai nominal <b><?php echo $paymentDetail['amount']; ?></b>.</li>
                                    <li>Konfirmasi pembayaran agar pesanan diproses.</li>
                                </ol>
                            </div>

                        <?php elseif ($paymentMethod === 'ewallet'): ?>
                            <div>
                                <h5 class="font-weight-bold mb-3">Pembayaran via <?php echo $ewalletChosen; ?></h5>
                                <p>Notifikasi pembayaran akan dikirim ke email/nomor Anda.</p>
                                <ol class="small">
                                    <li>Buka aplikasi <b><?php echo $ewalletChosen; ?></b>.</li>
                                    <li>Cek menu pembayaran tertunda.</li>
                                    <li>Bayar sebesar <b><?php echo $paymentDetail['amount']; ?></b>.</li>
                                </ol>
                                <div class="alert alert-info small">
                                    Jika belum muncul, tunggu beberapa menit atau periksa ulang aplikasi Anda.
                                </div>
                            </div>

                        <?php elseif ($paymentMethod === 'cod'): ?>
                            <div class="alert alert-success text-center">
                                <h4>✅ Pesanan COD Diterima!</h4>
                                <p>Bayar <b><?php echo $paymentDetail['amount']; ?></b> langsung ke kurir saat pesanan tiba.</p>
                                <hr>
                                <p>Pesanan sedang kami proses dan akan segera dikirim.</p>
                            </div>
                        <?php endif; ?>

                        <div class="text-center mt-4">
                            <a href="orders.php?page=pesanan" class="btn btn-primary btn-lg px-4">
                                <i class="fas fa-check-circle mr-2"></i> Cek Status Pesanan
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

</body>
</html>
