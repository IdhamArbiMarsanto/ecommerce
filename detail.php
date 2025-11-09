<?php
include 'partials/head.php';
include 'partials/topbar.php';
include 'partials/navbar.php';

// Ambil ID produk dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id === 0) {
    die('<h3 class="text-center mt-5">Produk tidak ditemukan</h3>');
}

// Panggil API backend
$apiUrl = "http://localhost/backend/api/product_get.php?id={$id}";
$response = @file_get_contents($apiUrl);
if (!$response) {
    die('<h3 class="text-center mt-5">Gagal mengambil data produk.</h3>');
}

$data = json_decode($response, true);
if (!$data || !$data['success']) {
    die('<h3 class="text-center mt-5">' . htmlspecialchars($data['message'] ?? 'Produk tidak ditemukan') . '</h3>');
}

$produk = $data['data'];
$photos = $data['photos'] ?? [];
?>
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <!-- Carousel Gambar -->
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <?php if (!empty($photos)): ?>
                        <?php foreach ($photos as $index => $photo): ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <img class="w-100 h-100"
                                     src="<?= htmlspecialchars($photo['file_path']) ?>"
                                     alt="Foto produk <?= $index + 1 ?>">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="img/default-product.jpg" alt="Default Image">
                        </div>
                    <?php endif; ?>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?= htmlspecialchars($produk['nama']) ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></h3>
            <p class="mb-4"><?= nl2br(htmlspecialchars($produk['deskripsi'])) ?></p>

            <!-- Info Size -->
            <div class="d-flex mb-3">
                <p class="text-dark font-weight-medium mb-0 mr-3">Ukuran: 
                    <?= htmlspecialchars($produk['size'] ?? '-') ?></p>
                <p class="mb-0">
                    Panjang: <?= htmlspecialchars($produk['panjang'] ?? '-') ?> cm /
                    Lebar: <?= htmlspecialchars($produk['lebar'] ?? '-') ?> cm
                </p>
            </div>

            <!-- Stok -->
            <p class="text-dark font-weight-medium mb-3">Stok: <?= htmlspecialchars($produk['stok']) ?> pcs</p>

            <div class="d-flex align-items-center mb-4 pt-2">
            <!-- Input jumlah -->
            <div class="input-group quantity mr-3" style="width: 130px;">
                <button class="btn btn-primary btn-minus"><i class="fa fa-minus"></i></button>
                <input type="text" class="form-control bg-secondary text-center" value="1">
                <button class="btn btn-primary btn-plus"><i class="fa fa-plus"></i></button>
            </div>

            <!-- Tombol keranjang -->
            <button class="btn btn-primary px-3 mr-3">
                <i class="fa fa-shopping-cart mr-1"></i>
            </button>

            <!-- Tombol beli sekarang -->
            <button class="btn btn-primary px-3">Beli Sekarang</button>
            </div>


            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Bagikan:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="text-dark px-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="text-dark px-2" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Review Section -->
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
            </div>

            <div class="tab-pane fade show active" id="tab-pane-3">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-4">Belum ada ulasan untuk produk ini</h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-4">Tulis ulasan</h4>
                        <div class="d-flex my-3">
                            <p class="mb-0 mr-2">Rating Anda:</p>
                            <div class="text-primary">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="message">Ulasan *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Kirim Ulasan" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Shop Detail End -->

<?php include 'partials/footer.php'; ?>

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JS -->

