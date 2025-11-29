<?php
include __DIR__ . '/../backend/config/config.php';
$db = get_db();

// Ambil 8 produk terbaru
$stmt = $db->query("SELECT * FROM produk ORDER BY created_at DESC LIMIT 8");
$produk_baru = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid pt-5">
    <style>
        .product-img { height: 300px; }
        .product-img img { height: 100%; width: 100%; object-fit: cover; display: block; }
    </style>

    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
    </div>

    <div class="row px-xl-5 pb-3">

        <?php foreach($produk_baru as $p): 
            $fotoUrl = !empty($p['foto']) 
                ? $p['foto'] 
                : BACKEND_URL . "/assets/images/products/default.png";
        ?>
        
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">

                <!-- IMAGE -->
                <a href="detail.php?id=<?= $p['id'] ?>" 
                   class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" 
                         src="<?= htmlspecialchars($fotoUrl) ?>" 
                         alt="<?= htmlspecialchars($p['nama']) ?>">
                </a>

                <!-- NAME + PRICE -->
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3"><?= htmlspecialchars($p['nama']) ?></h6>

                    <div class="d-flex justify-content-center align-items-center">
                        <?php if(!empty($p['harga_diskon']) && $p['harga_diskon'] > 0): ?>
                            <h6 class="text-muted mr-2 mb-0">
                                <del>Rp <?= number_format($p['harga'], 0, ',', '.') ?></del>
                            </h6>
                            <h6 class="product-price text-danger mb-0">
                                Rp <?= number_format($p['harga_diskon'], 0, ',', '.') ?>
                            </h6>
                        <?php else: ?>
                            <h6 class="product-price text-danger mb-0">
                                Rp <?= number_format($p['harga'], 0, ',', '.') ?>
                            </h6>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- BUTTONS -->
                <div class="card-footer d-flex justify-content-between bg-light border">

                    <a href="detail.php?id=<?= $p['id'] ?>" 
                       class="btn btn-sm text-primary p-0">
                        <i class="fas fa-eye text-primary mr-1"></i> View Detail
                    </a>

                    <div class="d-flex">

                        <!-- ADD TO CART -->
                        <a href="#" 
                           class="btn btn-sm btn-outline-secondary position-relative mr-2 cart-btn"
                           data-id="<?= $p['id'] ?>" 
                           title="Add to Cart">
                            <i class="fas fa-shopping-cart text-primary"></i>
                        </a>

                        <!-- WISHLIST -->
                        <a href="#" 
                           class="btn border like-btn" 
                           data-id="<?= $p['id'] ?>"
                           title="Add to Wishlist">
                            <i class="far fa-heart"></i>
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

    // =========================
    // WISHLIST (MATCH SHOP.PHP)
    // =========================
    $('.like-btn').click(function(e){
        e.preventDefault();
        let btn = $(this);
        let productId = btn.data('id');

        $.post('<?= BACKEND_URL ?>/api/wishlist.php', { id: productId }, function(response){
            if(response.status === 'added'){
                btn.find('i').removeClass('far').addClass('fas'); 
            } else if(response.status === 'removed'){
                btn.find('i').removeClass('fas').addClass('far'); 
            } else if(response.status === 'error'){
                alert(response.message);
            }
        }, 'json');
    });

    // =========================
    // CART API (IDENTIK SHOP)
    // =========================

    const BACKEND_BASE = '<?= defined("BACKEND_URL") ? rtrim(BACKEND_URL, "/") : "http://localhost/backend" ?>';
    const CART_API_ADD = BACKEND_BASE + '/api/cart.php?action=add';

    function disableBtn($btn, flag) {
        $btn.prop('disabled', !!flag);
        if (flag) $btn.addClass('opacity-50').css('pointer-events', 'none');
        else $btn.removeClass('opacity-50').css('pointer-events', 'auto');
    }

    $(document).on('click', '.cart-btn', async function(e){
        e.preventDefault();

        const $btn = $(this);
        if ($btn.data('processing')) return;

        $btn.data('processing', true);
        disableBtn($btn, true);

        const productId = $btn.data('id');

        try {
            const res = await fetch(CART_API_ADD, {
                method: 'POST',
                credentials: 'include',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ product_id: productId, quantity: 1 })
            });

            const j = await res.json().catch(() => ({ success:false, message:'Invalid response' }));

            if (!res.ok || !j.success) {
                throw new Error(j.message || 'Gagal menambahkan ke keranjang');
            }

            // MATCH SHOP.PHP EFFECT
            if (typeof loadCart === "function") loadCart();

            $btn.find('i').removeClass('fa-shopping-cart text-primary')
                          .addClass('fa-check text-success');

            setTimeout(() => {
                $btn.find('i').removeClass('fa-check text-success')
                              .addClass('fa-shopping-cart text-primary');
            }, 1500);

        } catch (err) {
            alert('Gagal menambahkan ke keranjang: ' + err.message);
        }

        $btn.data('processing', false);
        disableBtn($btn, false);
    });

});
</script>
