<?php
// Asumsi Anda menggunakan koneksi database
include __DIR__ . '/../backend/config/config.php';
$db = get_db();
?>
<?php include 'partials/head.php'; ?>
<?php include 'partials/topbar.php'; ?>
<style>
    .shopee-layout {
        min-height: 80vh;
        background-color: #f5f5f5; /* Warna latar belakang umum */
    }
    .account-sidebar {
        background-color: #ffffff;
        padding: 15px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        border-radius: .25rem;
    }
    .nav-tabs-shopee {
        background-color: #ffffff;
        padding: 0 15px;
        margin-bottom: 20px;
        border-radius: .25rem;
    }
    .nav-tabs-shopee .nav-link {
        color: #333;
        border: none;
        border-bottom: 3px solid transparent;
        transition: border-color 0.2s;
        padding: 15px 20px;
    }
    .nav-tabs-shopee .nav-link.active {
        color: #ee4d2d; /* Warna khas Shopee */
        border-bottom-color: #ee4d2d;
        font-weight: 600;
        background-color: transparent;
    }
    .order-card {
        background-color: #ffffff;
        margin-bottom: 15px;
        border-radius: .25rem;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }
    .order-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #eee;
    }
    .order-item-detail {
        display: flex;
        align-items: center;
        padding: 15px;
        border-bottom: 1px dashed #eee;
    }
    .order-summary {
        text-align: right;
        padding: 15px;
        border-top: 1px solid #eee;
    }
    .btn-shopee-primary {
        background-color: #ee4d2d;
        color: white;
        border: 1px solid #ee4d2d;
        transition: opacity 0.2s;
    }
    .status-text-success {
        color: #00b050; /* Selesai */
        font-weight: 600;
    }
</style>

<div class="container-fluid pt-5 shopee-layout">
    <div class="row px-xl-5">
        
        <div class="col-lg-3">
            <div class="account-sidebar">
                <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                    <div class="bg-success text-white rounded-circle mr-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">D</div>
                    <div>
                        <h6 class="font-weight-bold m-0">Profil</h6>
                        <small class="text-muted"><i class="fa fa-edit"></i> Ubah Profil</small>
                    </div>
                </div>
                
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none py-2 d-block text-danger font-weight-bold"><i class="fa fa-shopping-bag mr-2"></i> Pesanan Saya</a></li>
                    <li><a href="#" class="text-decoration-none py-2 d-block text-dark"><i class="fa fa-bell mr-2"></i> Notifikasi</a></li>
                    <li><a href="#" class="text-decoration-none py-2 d-block text-dark"><i class="fa fa-ticket-alt mr-2"></i> Voucher Saya</a></li>
                    <li><a href="#" class="text-decoration-none py-2 d-block text-dark"><i class="fa fa-coins mr-2"></i> Koin Saya</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col-lg-9">
            
            <ul class="nav nav-tabs nav-tabs-shopee" id="orderTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="paid-tab" data-toggle="tab" href="#paid" role="tab">Belum Bayar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="packing-tab" data-toggle="tab" href="#packing" role="tab">Sedang Dikemas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab">Selesai</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" id="cancelled-tab" data-toggle="tab" href="#cancelled" role="tab">Dibatalkan</a>
                </li>
            </ul>

            <div class="p-3 bg-white mb-3 text-center text-muted border rounded">
                Anda bisa cari berdasarkan **Nama Penjual**, **No. Pesanan** atau **Nama Produk**
            </div>
            
            <div class="tab-content" id="orderTabsContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel">

                    <div class="order-card">
                        <div class="order-card-header">
                            <h6 class="m-0 font-weight-bold">Penjual A</h6>
                            <span class="status-text-success">SELESAI</span>
                        </div>
                        
                        <div class="order-item-detail">
                            <img src="img/product-cartridge.jpg" alt="Cartridge Xlim" class="img-fluid mr-3" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #eee;">
                            <div class="flex-grow-1">
                                <p class="mb-0 font-weight-semi-bold">jjj</p>
                                <small class="text-muted">Vjjj</small>
                            </div>
                            <span class="font-weight-semi-bold">Rp33.000</span>
                        </div>
                        
                        <div class="order-summary">
                            <span class="text-muted mr-3">Total Pesanan:</span>
                            <strong class="text-danger" style="font-size: 1.2rem;">Rp38.500</strong>
                        </div>
                        
                        <div class="p-3 text-right border-top">
                            <button class="btn btn-sm btn-light border mr-2">Hubungi Penjual</button>
                            <button class="btn btn-sm btn-light border mr-2">Beli Lagi</button>
                            <button class="btn btn-sm btn-shopee-primary">Nilai</button>
                        </div>
                    </div>

                    <div class="order-card">
                        <div class="order-card-header">
                            <h6 class="m-0 font-weight-bold">Toko Outdoor Jaya</h6>
                            <span class="text-info font-weight-bold">DIKIRIM</span>
                        </div>
                        
                        <div class="order-item-detail">
                            <img src="img/product-jaket.jpg" alt="Jaket Outdoor" class="img-fluid mr-3" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #eee;">
                            <div class="flex-grow-1">
                                <p class="mb-0 font-weight-semi-bold">Jaket Anti Air Pria - Merah</p>
                                <small class="text-muted">Variasi: L x1</small>
                            </div>
                            <span class="font-weight-semi-bold">Rp250.000</span>
                        </div>
                        
                        <div class="order-summary">
                            <span class="text-muted mr-3">Total Pesanan:</span>
                            <strong class="text-danger" style="font-size: 1.2rem;">Rp265.000</strong>
                        </div>
                        
                        <div class="p-3 text-right border-top">
                            <button class="btn btn-sm btn-light border mr-2">Lacak</button>
                            <button class="btn btn-sm btn-shopee-primary">Pesanan Diterima</button>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="paid" role="tabpanel">
                     <p class="text-center p-5 text-muted">Belum ada pesanan yang perlu dibayar.</p>
                </div>
                 <div class="tab-pane fade" id="shipping" role="tabpanel">
                     <p class="text-center p-5 text-muted">Belum ada pesanan dalam status Dikirim.</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>