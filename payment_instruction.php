<?php
// =========================================================================
// ASUMSI: Data dari Backend sudah tersedia di variabel-variabel ini
// Anda hanya perlu fokus pada struktur HTML di bawah
// =========================================================================

// Contoh data yang akan diisi backend:
$paymentMethod = $_GET['method'] ?? 'bca'; // Contoh: 'bca', 'qris', 'gopay', 'cod'
$bankChosen = $_GET['bank'] ?? 'BCA'; // Hanya untuk M-Banking
$ewalletChosen = $_GET['ewallet'] ?? 'GoPay'; // Hanya untuk E-Wallet

$paymentDetail = [
    'amount' => 'Rp 160.000', // Total yang harus dibayar
    'due_time' => '17-10-2025 Pukul 23:59 WIB',
    'account_number' => '8097 000 123 456',
    'qrcode_url' => 'img/qris-placeholder.png', // Placeholder QR Code
];

// Menentukan judul dan ikon utama
$paymentTitle = '';
$paymentIcon = '';

if ($paymentMethod === 'bca') {
    $paymentTitle = 'Transfer Bank ' . $bankChosen;
    $paymentIcon = 'fas fa-university';
} elseif ($paymentMethod === 'qris') {
    $paymentTitle = 'Pembayaran QRIS';
    $paymentIcon = 'fas fa-qrcode';
} elseif ($paymentMethod === 'gopay' || $paymentMethod === 'ovo' || $paymentMethod === 'dana' || $paymentMethod === 'shopeepay') {
    $paymentMethod = 'ewallet'; // Kelompokkan menjadi ewallet
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include 'partials/topbar.php'; ?>
    <?php include 'partials/navbar.php'; ?> 
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Instruksi Pembayaran</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Pembayaran</p>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 justify-content-center">
            <div class="col-lg-8">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0 text-center">
                        <h4 class="font-weight-semi-bold m-0"><i class="<?php echo $paymentIcon; ?> mr-2"></i> <?php echo $paymentTitle; ?></h4>
                    </div>
                    <div class="card-body">
                        
                        <?php if ($paymentMethod !== 'cod'): ?>
                            <div class="alert alert-danger text-center mb-4">
                                <strong>Segera Selesaikan Pembayaran!</strong>
                                <p class="mb-0">Total: <span class="font-weight-bold h4 text-danger"><?php echo $paymentDetail['amount']; ?></span></p>
                                <p class="mb-0">Batas Akhir: <span class="font-weight-bold"><?php echo $paymentDetail['due_time']; ?></span></p>
                            </div>
                        <?php endif; ?>

                        <?php if ($paymentMethod === 'qris'): ?>
                            <div class="text-center p-3 border rounded">
                                <h5 class="mb-3 font-weight-bold">Langkah Pembayaran QRIS</h5>
                                <p>1. Buka aplikasi E-Wallet (GoPay, DANA, OVO, dll.) atau M-Banking Anda.</p>
                                <p>2. Pilih menu "Scan QR" / "Pembayaran QR".</p>
                                <p>3. Scan Kode QR di bawah ini:</p>
                                
                                <div class="mx-auto my-4 p-2 border" style="width: 200px;">
                                    <img src="<?php echo $paymentDetail['qrcode_url']; ?>" alt="QRIS Code" class="img-fluid"> 
                                </div>
                                
                                <p class="font-weight-bold">Pastikan jumlah yang dibayar adalah <?php echo $paymentDetail['amount']; ?></p>
                            </div>

                        <?php elseif ($paymentMethod === 'bca'): ?>
                            <div class="p-3 border rounded">
                                <h5 class="mb-3 font-weight-bold">Detail Transfer Bank <?php echo $bankChosen; ?></h5>
                                
                                <div class="d-flex justify-content-between mb-2 p-2 bg-light rounded">
                                    <span class="font-weight-medium">Nomor Rekening:</span>
                                    <span class="font-weight-bold text-primary h5"><?php echo $paymentDetail['account_number']; ?></span>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-4 p-2 bg-light rounded">
                                    <span class="font-weight-medium">Atas Nama:</span>
                                    <span class="font-weight-bold text-dark">PT EShopper Indonesia</span>
                                </div>
                                
                                <h6>Instruksi Transfer:</h6>
                                <ol class="small">
                                    <li>Lakukan transfer ke nomor rekening di atas.</li>
                                    <li>Masukkan jumlah persis **<?php echo $paymentDetail['amount']; ?>** tanpa dibulatkan.</li>
                                    <li>Konfirmasi pembayaran agar pesanan segera diproses.</li>
                                </ol>
                            </div>
                        
                        <?php elseif ($paymentMethod === 'ewallet'): ?>
                            <div class="p-3 border rounded">
                                <h5 class="mb-3 font-weight-bold">Pembayaran Melalui <?php echo $ewalletChosen; ?></h5>
                                
                                <p>Instruksi pembayaran akan dikirimkan ke nomor ponsel/email yang terdaftar: <span class="font-weight-bold">example@email.com</span>.</p>
                                
                                <h6>Cara Melunasi:</h6>
                                <ol class="small">
                                    <li>Buka aplikasi **<?php echo $ewalletChosen; ?>** Anda.</li>
                                    <li>Cek notifikasi/menu pembayaran tertunda.</li>
                                    <li>Lakukan pembayaran sebesar **<?php echo $paymentDetail['amount']; ?>**.</li>
                                </ol>
                                <div class="alert alert-info mt-3 small">
                                    Anda mungkin menerima kode pembayaran unik. Pastikan mengikuti langkah-langkah di aplikasi.
                                </div>
                            </div>
                        
                        <?php elseif ($paymentMethod === 'cod'): ?>
                            <div class="alert alert-success text-center">
                                <h4 class="alert-heading">✅ Pesanan COD Berhasil Dikonfirmasi!</h4>
                                <p class="lead">Anda akan membayar **<?php echo $paymentDetail['amount']; ?>** secara tunai kepada kurir saat pesanan Anda tiba.</p>
                                <hr>
                                <p class="mb-0">Pesanan Anda akan segera kami proses dan kirim.</p>
                            </div>
                        
                        <?php endif; ?>

                    </div>
                    
                    <div class="card-footer border-secondary bg-transparent text-center">
                        <p class="mb-3 small">Setelah pembayaran, klik tombol di bawah untuk memantau status pesanan Anda.</p>
                        <a href="order_status.php" class="btn btn-lg btn-block btn-primary font-weight-bold py-3">
                            <i class="fas fa-check-circle mr-2"></i> Cek Status Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'partials/footer.php'; ?>
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>



</body>

</html>