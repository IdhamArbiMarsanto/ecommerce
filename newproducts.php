<?php
include __DIR__ . '/../backend/config/config.php';
$db = get_db();
?>


<div class="container-fluid pt-5">
    <style>
        /* Ensure product images keep consistent crop regardless of original dimensions */
        /* Fixed card image height to 300px for consistent grid; object-fit will crop as needed */
        .product-img { height: 300px; }
        .product-img img { height: 100%; width: 100%; object-fit: cover; display: block; }
    </style>
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php
        $stmt = $db->query("SELECT * FROM produk ORDER BY created_at DESC LIMIT 8");
        $produk_baru = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($produk_baru as $produk):
            // Pakai URL langsung dari database
            $fotoUrl = !empty($produk['foto']) ? $produk['foto'] : BACKEND_URL . '/assets/images/products/default.png';
        ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <a href="detail.php?id=<?= $produk['id'] ?>" class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="<?= htmlspecialchars($fotoUrl) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>">
                </a>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3"><?= htmlspecialchars($produk['nama']) ?></h6>
                    <div class="d-flex justify-content-center align-items-center">
                        <?php if(!empty($produk['harga_diskon']) && $produk['harga_diskon'] > 0): ?>
                            <h6 class="text-muted mr-2 mb-0"><del>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></del></h6>
                            <h6 class="product-price text-danger mb-0">Rp <?= number_format($produk['harga_diskon'], 0, ',', '.') ?></h6>
                        <?php else: ?>
                            <h6 class="product-price text-danger mb-0">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></h6>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="detail.php?id=<?= $produk['id'] ?>" class="btn btn-sm text-primary p-0">
                        <i class="fas fa-eye text-primary mr-1"></i>View Detail
                    </a>
                    <div class="d-flex">
                        <a href="#" class="btn btn-sm btn-outline-secondary position-relative mr-2 cart-btn" data-id="<?= $produk['id'] ?>" title="Add to cart">
                            <i class="fas fa-shopping-cart text-primary"></i>
                        </a>
                        <a href="#" class="btn border like-btn" data-id="<?= $produk['id'] ?>" title="Add to Wishlist" aria-pressed="false">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('.cart-btn').click(function(e){
        e.preventDefault();
        let btn = $(this);
        let productId = btn.data('id');

        $.post('<?= BACKEND_URL ?>/api/cart_add.php', { id: productId }, function(response){
            if(response.status === 'added'){
                alert('Product added to cart!');
            } else if(response.status === 'updated'){
                alert('Product quantity updated in cart!');
            } else if(response.status === 'error'){
                alert(response.message);
            }
        }, 'json');
    });

    $('.like-btn').click(function(e){
        e.preventDefault();
        let btn = $(this);
        let productId = btn.data('id');

        $.post('<?= BACKEND_URL ?>/api/wishlist.php', { id: productId }, function(response){
            if(response.status === 'added'){
                btn.addClass('liked');
                btn.attr('aria-pressed','true');
            } else if(response.status === 'removed'){
                btn.removeClass('liked');
                btn.attr('aria-pressed','false');
            } else if(response.status === 'error'){
                alert(response.message);
            }
        }, 'json');
    });
});
</script>
