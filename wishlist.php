<?php include 'partials/head.php'; ?>
<?php include 'partials/topbar.php'; ?>
<?php include 'partials/navbar.php'; ?>

<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Wishlist</span></h2>
    </div>

    <style>
        /* Match newproducts.php product image crop and footer sizing */
        .product-img { height: 300px; }
        .product-img img { height: 100%; width: 100%; object-fit: cover; display: block; }

        /* Action buttons in footer: square 36x36 icons */
        .product-item .card-footer .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 8px;
            min-width: 36px;
            height: 36px;
            border-radius: 6px;
        }
        .product-item .card-footer a.btn.btn-sm.text-dark.p-0 { padding: 0 6px; min-width: auto; height: auto; }
        .product-item .card-footer i.fas { font-size: 16px; line-height: 1; }
        .product-item .card-footer .cart-btn { width: 36px; height: 36px; padding: 0; }
        .product-item .card-footer a.btn.btn-sm.text-dark.p-0 i.fas.fa-eye { margin-right: 8px; font-size: 16px; }
    </style>

    <div class="row px-xl-5 pb-3">
        <!-- Example wishlist items (static placeholders) -->
        <?php for ($i = 1; $i <= 8; $i++): ?>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-<?php echo $i; ?>.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                    <div class="d-flex justify-content-center">
                        <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="detail.php" class="btn btn-sm text-primary p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <div class="d-flex">
                        <a href="#" class="btn btn-sm btn-outline-secondary position-relative mr-2 cart-btn" title="Add to cart">
                            <i class="fas fa-shopping-cart text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>

<?php include 'partials/footer.php'; ?>

<script>
// Heart toggle behavior (outline -> filled)
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.like-btn').forEach(function(btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const pressed = btn.getAttribute('aria-pressed') === 'true';
            btn.classList.toggle('liked', !pressed);
            btn.setAttribute('aria-pressed', (!pressed).toString());
        });
    });
});
</script>