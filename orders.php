<?php
// Asumsi Anda menggunakan koneksi database
include __DIR__ . '/../backend/config/config.php';
$db = get_db();
?>
<?php include 'partials/head.php'; ?>
<?php include 'partials/topbar.php'; ?>
<style>


:root {
    --eo-green: #8BA05A;
    --eo-green-dark: #6f8047;
    --eo-border: #dcdcdc;
}

/* Tombol utama */
.btn-eo-primary {
    background-color: var(--eo-green);
    color: white;
    border: 1px solid var(--eo-green);
    <?php
    // Safe include for config (development may not have backend present)
    $configPath = __DIR__ . '/../backend/config/config.php';
    if (file_exists($configPath)) {
        include $configPath;
        if (function_exists('get_db')) {
            $db = get_db();
        } else {
            $db = null;
        }
    } else {
        $db = null;
    }

    // Determine which tab/page to show early so sidebar can use it
    $page = isset($_GET['page']) ? $_GET['page'] : 'profil';
    ?>
    <?php include 'partials/head.php'; ?>
    <?php include 'partials/topbar.php'; ?>
    <style>

    :root {
        --eo-green: #8BA05A;
        --eo-green-dark: #6f8047;
        --eo-border: #dcdcdc;
    }

    /* Tombol utama */
    .btn-eo-primary {
        background-color: var(--eo-green);
        color: white;
        border: 1px solid var(--eo-green);
        transition: 0.2s;
    }

    .btn-eo-primary:hover {
        background-color: var(--eo-green-dark);
        border-color: var(--eo-green-dark);
        color: #fff;
    }

    /* Sidebar background */
    .account-sidebar {
        background-color: #ffffff;
        padding: 15px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
    }

    /* Lingkaran avatar */
    .eo-avatar {
        width: 40px;
        height: 40px;
        background: var(--eo-green);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    /* Modal */
    .modal-content {
        border-radius: 10px;
        border: 1px solid var(--eo-border);
    }

    .modal-header {
        border-bottom: 1px solid var(--eo-border);
    }

    .modal-title {
        font-weight: bold;
        color: #333;
    }

    /* Custom style untuk pills/tabs di halaman pesanan */
    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        color: var(--eo-green);
        background-color: transparent !important;
        border-bottom: 2px solid var(--eo-green);
        font-weight: bold;
        border-radius: 0;
    }
    .nav-pills .nav-link { border-radius: 0; }

    </style>

    <div class="container-fluid pt-5 shopee-layout">
        <div class="row px-xl-5">
            <div class="col-lg-3">
                <div class="account-sidebar">
                    <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                        <div class="bg-success text-white rounded-circle mr-3" 
                             style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                             D
                        </div>
                        <div>
                            <h6 class="font-weight-bold m-0">Akun Saya</h6>
                        </div>
                    </div>

                    <a class="d-flex justify-content-between align-items-center py-2 text-dark" data-toggle="collapse" href="#akunMenu">
                        <span><i class="fa fa-user mr-2"></i> Akun</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>

                    <div class="collapse pl-3 <?php if($page=='profil'||$page=='alamat') echo 'show'; ?>" id="akunMenu">
                        <a href="orders.php?page=profil" class="d-block py-2 <?php if($page=='profil') echo 'text-danger font-weight-bold'; ?>">Profil</a>
                        <a href="orders.php?page=alamat" class="d-block py-2 <?php if($page=='alamat') echo 'text-danger font-weight-bold'; ?>">Alamat</a>
                    </div>

                    <a href="orders.php?page=pesanan" class="d-block py-2 text-dark <?php if($page=='pesanan') echo 'text-danger font-weight-bold'; ?>">
                       <i class="fa fa-shopping-bag mr-2"></i> Pesanan Saya
                    </a>
                </div>
            </div>

            <div class="col-lg-9">

    <?php
    // Helper to render order card
    function render_order_card($order_id, $date, $status, $items, $total, $button_class, $button_text) {
        $status_color = 'dark';
        if ($status == 'Menunggu Pembayaran') $status_color = 'danger';
        else if ($status == 'Dikemas') $status_color = 'warning';
        else if ($status == 'Diantar') $status_color = 'primary';
        else if ($status == 'Selesai') $status_color = 'success';
        ?>
        <div class="card border-secondary mb-4">
            <div class="card-header d-flex justify-content-between align-items-center bg-light">
                <h6 class="mb-0 font-weight-bold">No. Pesanan: <span class="text-primary"><?php echo $order_id; ?></span></h6>
                <span class="text-<?php echo $status_color; ?> font-weight-bold"><?php echo $status; ?></span>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3 border-bottom pb-3">
                    <img src="img/product-placeholder.jpg" style="width: 60px; height: 60px; object-fit: cover;" class="rounded mr-3" alt="Produk"> 
                    <div>
                        <p class="mb-0 font-weight-semi-bold">Nama Produk Pertama... (dan <?php echo $items; ?> lainnya)</p>
                        <small class="text-muted">Tanggal Pesan: <?php echo $date; ?></small>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Total: <span class="font-weight-bold text-dark">Rp <?php echo $total; ?></span></h6>
                    <div>
                        <a href="orders.php?page=detail&id=<?php echo $order_id; ?>" class="btn btn-sm btn-light border mr-2">Lihat Detail</a>
                        <button class="btn btn-sm <?php echo $button_class; ?> text-white"><?php echo $button_text; ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <?php if ($page == 'profil'): ?>

    <?php $foto = "uploads/default.png"; ?>
    <div class="bg-white p-4 rounded shadow-sm">
        <h4 class="font-weight-bold mb-3">Profil</h4>
        <div class="row">
            <div class="col-md-8">
                <form>
                    <div class="form-group"><label>Nama</label><input type="text" class="form-control" value="Agus Solar"></div>
                    <div class="form-group"><label>Email</label><input type="email" class="form-control" value="example@gmail.com"></div>
                    <div class="form-group"><label>No Telepon</label><input type="text" class="form-control" value="6969696969696"></div>
                    <button class="btn btn-eo-primary mt-3">Simpan</button>
                </form>
            </div>
            <div class="col-md-4 text-center">
                <img id="profilePreview" src="<?php echo $foto; ?>" style="width:130px; height:130px; border-radius:50%; object-fit:cover; background:#ccc;">
                <br><br>
                <form action method="POST" enctype="multipart/form-data">
                    <input type="file" name="foto" id="fotoInput" accept="image/*" onchange="previewImage(event)" style="display:none;">
                    <button type="button" class="btn btn-light border" onclick="document.getElementById('fotoInput').click();">Pilih Gambar</button>
                    <button class="btn btn-eo-primary mt-2" type="submit">Upload</button>
                </form>
                <p class="mt-2 text-muted" style="font-size:0.9rem;">Maks. 1MB • Format: JPEG, PNG</p>
            </div>
        </div>
    </div>

    <?php elseif ($page == 'alamat'): ?>

    <div class="bg-white p-4 rounded shadow-sm">
        <h4 class="font-weight-bold mb-3">Alamat Saya</h4>
        <div class="border p-3 mb-3 rounded">
            <h6>Alamat Utama</h6>
            <p class="mb-1">Idham Arbi</p>
            <p class="mb-1">Jl. Kenangan No. 123</p>
            <p class="mb-1">Kecamatan Bandung Wetan, Kota Bandung</p>
            <p class="mb-1">08123456789</p>
        </div>
        <button class="btn btn-eo-primary mt-2" data-toggle="modal" data-target="#modalTambahAlamat">Tambah Alamat</button>

        <!-- Modal Tambah Alamat -->
        <div class="modal fade" id="modalTambahAlamat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Alamat Baru</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form>
                    <div class="form-group"><label>Nama Penerima</label><input type="text" class="form-control"></div>
                    <div class="form-group"><label>Alamat Lengkap</label><textarea class="form-control"></textarea></div>
                    <div class="form-group"><label>Kecamatan</label><input type="text" class="form-control"></div>
                    <div class="form-group"><label>Kota</label><input type="text" class="form-control"></div>
                    <div class="form-group"><label>No Telepon</label><input type="text" class="form-control"></div>
                    <button type="button" class="btn btn-eo-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>

    <?php elseif ($page == 'pesanan'): ?>

        <div class="bg-white p-4 rounded shadow-sm">
            <h4 class="font-weight-bold mb-3">Pesanan Saya</h4>

            <ul class="nav nav-pills mb-3 border-bottom" id="pills-tab" role="tablist">
                <li class="nav-item"><a class="nav-link active text-dark" id="all-tab" data-toggle="pill" href="#all" role="tab">Semua</a></li>
                <li class="nav-item"><a class="nav-link text-dark" id="payment-tab" data-toggle="pill" href="#payment" role="tab">Menunggu Pembayaran</a></li>
                <li class="nav-item"><a class="nav-link text-dark" id="packed-tab" data-toggle="pill" href="#packed" role="tab">Dikemas</a></li>
                <li class="nav-item"><a class="nav-link text-dark" id="shipping-tab" data-toggle="pill" href="#shipping" role="tab">Diantar</a></li>
                <li class="nav-item"><a class="nav-link text-dark" id="completed-tab" data-toggle="pill" href="#completed" role="tab">Selesai</a></li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel">
                    <?php
                    render_order_card('ID001', '2025-11-18', 'Menunggu Pembayaran', '3 Produk', '260.000', 'btn-danger', 'Bayar Sekarang');
                    render_order_card('ID002', '2025-11-17', 'Dikemas', '1 Produk', '150.000', 'btn-warning', 'Lihat Detail');
                    render_order_card('ID003', '2025-11-15', 'Diantar', '5 Produk', '450.000', 'btn-primary', 'Lacak');
                    render_order_card('ID004', '2025-11-10', 'Selesai', '2 Produk', '200.000', 'btn-success', 'Beri Nilai');
                    ?>
                </div>
                <div class="tab-pane fade" id="payment" role="tabpanel">
                    <?php render_order_card('ID001', '2025-11-18', 'Menunggu Pembayaran', '3 Produk', '260.000', 'btn-danger', 'Bayar Sekarang'); ?>
                </div>
                <div class="tab-pane fade" id="packed" role="tabpanel">
                    <?php render_order_card('ID002', '2025-11-17', 'Dikemas', '1 Produk', '150.000', 'btn-warning', 'Lihat Detail'); ?>
                </div>
                <div class="tab-pane fade" id="shipping" role="tabpanel">
                    <?php render_order_card('ID003', '2025-11-15', 'Diantar', '5 Produk', '450.000', 'btn-primary', 'Lacak'); ?>
                </div>
                <div class="tab-pane fade" id="completed" role="tabpanel">
                    <?php render_order_card('ID004', '2025-11-10', 'Selesai', '2 Produk', '200.000', 'btn-success', 'Beri Nilai'); ?>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="bg-white p-5 text-center rounded shadow-sm"><p class="text-muted">Halaman tidak ditemukan.</p></div>
    <?php endif; ?>

            </div> <!-- .col-lg-9 -->
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>
    <script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            document.getElementById("profilePreview").src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>

