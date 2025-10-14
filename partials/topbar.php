<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="faq.php">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="https://www.instagram.com/effort_outdoor/?igsh=a3d3ZXV3d3o1b2Jv#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="https://shopee.co.id/effort_outdoor" target="_blank">
                        <img src="https://e7.pngegg.com/pngimages/664/195/png-clipart-shopee-indonesia-android-android-text-rectangle-thumbnail.png"
                            alt="Shopee"
                            style="width: 25px; height: 25px;">
                        </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none d-flex align-items-center">
                <img src="img/logo.jpg" alt="Logo" style="height: 56px; width: auto;" class="mr-1 border" />
                <h1 class="m-0 display-5 font-weight-semi-bold">Effort Outdoor</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right position-relative">
            <a href="wishlist.php" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <!-- Tombol Cart -->
            <a href="#" class="btn border" id="cartToggle">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">0</span>
            </a>

            <!-- Mini Cart -->
            <div id="miniCart" class="card shadow position-absolute"
                 style="top:60px; right:0; width:300px; display:none; z-index:999;">
                <div class="card-body">
                    <h6 class="mb-3">Shopping Cart</h6>
                    <div class="cart-item d-flex justify-content-between mb-2">
                        <span>Produk A</span>
                        <span>Rp50.000</span>
                    </div>
                    <div class="cart-item d-flex justify-content-between mb-2">
                        <span>Produk B</span>
                        <span>Rp70.000</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total</strong>
                        <strong>Rp120.000</strong>
                    </div>
                    <a href="cart.php" class="btn btn-primary btn-block mt-3">View Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Script Toggle MiniCart -->
<script>
    document.getElementById("cartToggle").addEventListener("click", function(e){
        e.preventDefault();
        const miniCart = document.getElementById("miniCart");
        miniCart.style.display = (miniCart.style.display === "none" || miniCart.style.display === "") 
            ? "block" : "none";
    });
</script>
