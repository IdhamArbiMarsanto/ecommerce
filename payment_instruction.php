<?php
// ===============================================================
// ASUMSI: Data backend sudah terisi, bagian bawah hanya layout
// ===============================================================

$paymentMethod = $_GET['method'] ?? 'mbanking'; 
$bankChosen = $_GET['bank'] ?? 'BCA'; 
$ewalletChosen = $_GET['ewallet'] ?? 'GoPay'; 

// use qrcode passed from checkout if available
$paymentDetail = [
    'amount' => $_GET['amount'] ?? 'Rp 160.000',
    'due_time' => date('d-m-Y', strtotime('+1 day')) . ' Pukul 23:59 WIB',
    'account_number' => '8097000123456',
    'qrcode_url' => $_GET['qrcode'] ?? 'img/qris.png',
];

// small unique transaction id for user reference (not a payment gateway id)
$transactionId = 'TRX' . strtoupper(substr(md5(uniqid('', true)), 0, 8));

// Tentukan judul dan ikon
$paymentTitle = '';
$paymentIcon = '';

if ($paymentMethod === 'mbanking' || $paymentMethod === 'bca') {
    $paymentTitle = 'Transfer Bank ' . $bankChosen;
    $paymentIcon = 'fas fa-university';
    $displayMethod = 'mbanking';
} elseif ($paymentMethod === 'qris') {
    $paymentTitle = 'Pembayaran QRIS';
    $paymentIcon = 'fas fa-qrcode';
    $displayMethod = 'qris';
} elseif ($paymentMethod === 'ewallet' || in_array(strtolower($paymentMethod), ['gopay', 'ovo', 'dana', 'shopeepay'])) {
    $paymentTitle = 'Dompet Digital (' . $ewalletChosen . ')';
    $paymentIcon = 'fas fa-wallet';
    $displayMethod = 'ewallet';
} elseif ($paymentMethod === 'cod') {
    $paymentTitle = 'Cash On Delivery (COD)';
    $paymentIcon = 'fas fa-money-bill-wave';
    $displayMethod = 'cod';
} else {
    $paymentTitle = 'Metode Pembayaran Tidak Dikenal';
    $paymentIcon = 'fas fa-exclamation-triangle';
    $displayMethod = 'unknown';
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
            box-shadow: 0 6px 26px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .payment-header {
            background: linear-gradient(180deg,#f5f7fb,#eef4fa);
            padding: 20px;
            border-bottom: 1px solid #e6eef4;
        }
        .payment-header h4 {
            margin: 0;
            font-weight: 600;
        }

        .pi-topline { display:flex; align-items:center; justify-content:space-between; gap:12px; }
        .pi-amount { font-size: 28px; color:#dc3545; font-weight:700; }
        .pi-meta { color:#6c757d; }
        /* keep headings/steps consistent with site defaults */
        .pi-heading { font-size: 18px; font-weight: 700; }
        .pi-steps { font-size: 14px; line-height: 1.5; }
        .pi-step-list { font-size: 14px; line-height: 1.6; }
        .pi-step-list li { margin-bottom: 8px; }
        .pi-alert { font-size: 13px; line-height: 1.4; }
        .pi-button { font-size: 13px; padding: 6px 12px; }
        .bank-detail { font-size: 14px; }
        .bank-detail .acct-num { font-size: 18px; }

        .qris-box img {
            max-width: 420px;
            width: 100%;
            height: auto;
            border: 6px solid #fff;
            border-radius: 12px;
            padding: 8px;
            background: #fff;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
        }

        .qris-actions {
            display: flex;
            gap: 8px;
            justify-content: center;
            margin-top: 10px;
        }
        .qris-actions .btn { min-width: 140px; }

        .bank-detail {
            display:flex; align-items:center; justify-content:space-between; gap:10px; background:#f8fbff; padding:12px; border-radius:8px;
        }

        .copy-btn { min-width:120px; }

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

                        <?php if ($displayMethod !== 'cod'): ?>
                        <div class="alert alert-danger text-center">
                            <strong>Segera Lakukan Pembayaran!</strong>
                            <p>Total: <span class="h4 text-danger"><?php echo $paymentDetail['amount']; ?></span></p>
                            <p>Batas Akhir: <b><?php echo $paymentDetail['due_time']; ?></b></p>
                        </div>
                        <?php endif; ?>

                        <?php if ($displayMethod === 'qris'): ?>
                            <div class="text-center">
                                <div class="pi-topline mb-2">
                                    <div>
                                        <h5 class="mb-1 font-weight-bold">Langkah Pembayaran QRIS</h5>
                                        <div class="pi-meta">Transaksi: <strong><?php echo $transactionId; ?></strong></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="pi-amount"><?php echo $paymentDetail['amount']; ?></div>
                                    </div>
                                </div>

                                <p class="mb-1">1. Buka aplikasi E-Wallet atau M-Banking Anda</p>
                                <p class="mb-1">2. Pilih menu "Scan QR" / "Pembayaran QR"</p>
                                <p class="mb-3">3. Arahkan kamera ke QR Code di bawah ini:</p>

                                <div class="qris-box mx-auto my-3 text-center">
                                    <img id="piQrisImage" src="<?php echo $paymentDetail['qrcode_url']; ?>" alt="QRIS Code">
                                    <div class="qris-actions">
                                        <a id="downloadQris" href="<?php echo $paymentDetail['qrcode_url']; ?>" download class="btn btn-outline-primary btn-sm">Download QR</a>
                                        <button id="copyAmountBtn" type="button" class="btn btn-outline-secondary btn-sm copy-btn">Salin Nominal</button>
                                    </div>
                                </div>
                                <p class="font-weight-bold">Nominal: <span id="piAmountText"><?php echo $paymentDetail['amount']; ?></span></p>
                            </div>

                        <?php elseif ($displayMethod === 'mbanking'): ?>
                            <div>
                                <div class="pi-topline mb-2">
                                    <div>
                                        <h5 class="font-weight-bold mb-1">Transfer Bank - <?php echo $bankChosen; ?></h5>
                                        <div class="pi-meta">Transaksi: <strong><?php echo $transactionId; ?></strong></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="pi-amount"><?php echo $paymentDetail['amount']; ?></div>
                                    </div>
                                </div>

                                <div class="bank-detail mb-3">
                                    <div>
                                        <div class="small" style="font-size: 13px; color: #666;">No. Rekening</div>
                                        <div class="h5 mb-0"><strong id="piAccountNumber" class="acct-num"><?php echo $paymentDetail['account_number']; ?></strong></div>
                                        <div class="small text-muted" style="font-size: 13px;">a.n PT EShopper Indonesia</div>
                                    </div>
                                    <div class="text-right">
                                        <button id="copyAccountBtn" class="btn btn-outline-secondary copy-btn pi-button">Salin No. Rekening</button>
                                    </div>
                                </div>

                                <h6 style="font-size: 18px; font-weight: 700; margin-top: 16px;">Langkah Transfer:</h6>
                                <ol class="pi-step-list">
                                    <li>Masukkan nomor rekening di atas pada menu transfer bank Anda.</li>
                                    <li>Transfer sesuai nominal <b><?php echo $paymentDetail['amount']; ?></b>. 
                                        <div class="small text-muted">Gunakan kode unik/nominal persis agar konfirmasi otomatis lebih cepat.</div>
                                    </li>
                                    <li>Setelah transfer, Anda dapat <a href="orders.php?page=pesanan">cek status pesanan</a> atau hubungi customer service jika perlu.</li>
                                </ol>
                            </div>

                        <?php elseif ($displayMethod === 'ewallet'): ?>
                            <div>
                                <div class="pi-topline mb-2">
                                    <div>
                                        <h5 class="font-weight-bold mb-1">Pembayaran via <?php echo $ewalletChosen; ?></h5>
                                        <div class="pi-meta">Transaksi: <strong><?php echo $transactionId; ?></strong></div>
                                    </div>
                                    <div class="text-right">
                                        <div class="pi-amount"><?php echo $paymentDetail['amount']; ?></div>
                                    </div>
                                </div>

                                <p class="mb-2 pi-steps">1. Buka aplikasi <b><?php echo $ewalletChosen; ?></b> di ponsel Anda.</p>
                                <p class="mb-2 pi-steps">2. Cari menu pembayaran atau tagihan, lalu pilih "Bayar".</p>
                                <p class="mb-2 pi-steps">3. Masukkan nominal atau konfirmasi pembayaran jika ditampilkan.</p>

                                <div class="alert alert-info pi-alert">
                                    Jika pembayaran tidak muncul segera, buka aplikasi <b><?php echo $ewalletChosen; ?></b> dan lakukan pemindaian/konfirmasi secara manual.
                                </div>

                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-success pi-button">Buka <?php echo $ewalletChosen; ?></a>
                                </div>
                            </div>

                        <?php elseif ($displayMethod === 'cod'): ?>
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

    <script>
        // small helpers: copy nominal, copy account, and ensure download link is correct
        (function(){
            const downloadBtn = document.getElementById('downloadQris');
            const qrisImg = document.getElementById('piQrisImage');
            const copyAmountBtn = document.getElementById('copyAmountBtn');
            const amountText = document.getElementById('piAmountText');
            const copyAccountBtn = document.getElementById('copyAccountBtn');
            const accountEl = document.getElementById('piAccountNumber');

            if (downloadBtn && qrisImg) {
                // ensure download link points to the image src
                downloadBtn.href = qrisImg.src;
            }

            function showTempMessage(btn, msg, fallbackLabel) {
                const original = btn.textContent;
                btn.textContent = msg;
                setTimeout(()=> btn.textContent = fallbackLabel || original, 1500);
            }

            if (copyAmountBtn && amountText) {
                copyAmountBtn.addEventListener('click', function(){
                    const text = amountText.textContent.trim();
                    if (!navigator.clipboard) {
                        alert('Salin: ' + text);
                        return;
                    }
                    navigator.clipboard.writeText(text).then(function(){
                        showTempMessage(copyAmountBtn, 'Tersalin ✓', 'Salin Nominal');
                    }).catch(function(){
                        alert('Gagal menyalin nominal');
                    });
                });
            }

            if (copyAccountBtn && accountEl) {
                copyAccountBtn.addEventListener('click', function(){
                    const acc = accountEl.textContent.trim();
                    if (!navigator.clipboard) {
                        alert('Salin: ' + acc);
                        return;
                    }
                    navigator.clipboard.writeText(acc).then(function(){
                        showTempMessage(copyAccountBtn, 'Tersalin ✓', 'Salin No. Rekening');
                    }).catch(function(){
                        alert('Gagal menyalin nomor rekening');
                    });
                });
            }
        })();
    </script>

</body>
</html>
