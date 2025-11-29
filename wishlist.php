<?php
include 'partials/head.php';
include __DIR__ . '/../backend/config/config.php';
$db = get_db();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user']['id'])) {
    header("Location: login.php");
    exit;
}
$user_id = $_SESSION['user']['id'];

include 'partials/topbar.php';
include 'partials/navbar.php';

// Ambil data wishlist
$stmt = $db->prepare("
    SELECT p.*
    FROM tb_wishlist w
    JOIN produk p ON w.product_id = p.id
    WHERE w.user_id = ?
    ORDER BY p.created_at DESC
");
$stmt->execute([$user_id]);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Wishlist</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Wishlist</p>
        </div>
    </div>
</div>

<!-- Wishlist Start -->
<div class="container-fluid pt-5">
    <style>
        .product-img { height: 300px; }
        .product-img img { height: 100%; width: 100%; object-fit: cover; }

        .like-btn i.fas.fa-heart { color:#e60101; font-size:18px; }
        .like-btn i.far.fa-heart { color:#bbb; font-size:18px; }
    </style>

    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div class="row pb-3">

                <?php if (empty($products)): ?>
                    <div class="col-12 text-center py-5">
                        <h4>Wishlist kamu masih kosong 😢</h4>
                        <a href="shop.php" class="btn btn-primary mt-3">Belanja Sekarang</a>
                    </div>
                <?php endif; ?>

                <?php foreach ($products as $produk): ?>
                    <?php 
                        $fotoUrl = !empty($produk['foto']) 
                            ? $produk['foto'] 
                            : BACKEND_URL . '/assets/images/products/default.png';
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">

                            <!-- FOTO -->
                            <a href="detail.php?id=<?= $produk['id'] ?>" 
                               class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?= htmlspecialchars($fotoUrl) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>">
                            </a>

                            <!-- NAMA & HARGA -->
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?= htmlspecialchars($produk['nama']) ?></h6>

                                <div class="d-flex justify-content-center align-items-center">
                                    <?php if (!empty($produk['harga_diskon']) && $produk['harga_diskon'] > 0): ?>
                                        <h6 class="text-muted mr-2 mb-0">
                                            <del>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></del>
                                        </h6>
                                        <h6 class="text-danger mb-0">
                                            Rp <?= number_format($produk['harga_diskon'], 0, ',', '.') ?>
                                        </h6>
                                    <?php else: ?>
                                        <h6 class="text-danger mb-0">
                                            Rp <?= number_format($produk['harga'], 0, ',', '.') ?>
                                        </h6>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- ACTION BUTTON -->
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="detail.php?id=<?= $produk['id'] ?>" class="btn btn-sm text-primary p-0">
                                    <i class="fas fa-eye text-primary mr-1"></i>View Detail
                                </a>

                                <div class="d-flex">
                                    <!-- Cart -->
                                    <a href="#" 
                                       class="btn btn-sm btn-outline-secondary position-relative mr-2 cart-btn"
                                       data-id="<?= $produk['id'] ?>">
                                        <i class="fas fa-shopping-cart text-primary"></i>
                                    </a>

                                    <!-- REMOVE FROM WISHLIST -->
                                    <a href="#" 
                                       class="btn border like-btn"
                                       data-id="<?= $produk['id'] ?>">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
<!-- Wishlist End -->

<?php include 'partials/footer.php'; ?>

<script>
$(document).ready(function(){

    // Remove from wishlist
    $('.like-btn').click(function(e){
        e.preventDefault();

        let btn = $(this);
        let productId = btn.data('id');

        $.ajax({
            url: '<?= BACKEND_URL ?>/api/wishlist.php',
            method: 'POST',
            xhrFields: { withCredentials: true },
            data: { id: productId },
            success: function(res){
                if (res.status === 'removed') {
                    btn.closest('.col-lg-3').fadeOut(300, function(){ $(this).remove(); });
                }
            }
        });
    });

});
</script>
