<?php
include __DIR__ . '/../backend/config/config.php';
$db = get_db();
?>
<?php include 'partials/head.php'; ?>
<?php include 'partials/topbar.php'; ?>

<!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                         <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">celana Panjang <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?category=celana-panjang&gender=men" class="dropdown-item" class="dropdown-item">Men's</a>
                                <a href="shop.php?category=celana-panjang&gender=women" class="dropdown-item" class="dropdown-item">Women's</a>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    Celana Pendek <i class="fa fa-angle-down float-right mt-1"></i>
                                </a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?category=celana-pendek&gender=men" class="dropdown-item" class="dropdown-item">Men's</a>
                                <a href="shop.php?category=celana-pendek&gender=women" class="dropdown-item" class="dropdown-item">Women's</a>
                                </div>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    Jaket <i class="fa fa-angle-down float-right mt-1"></i>
                                </a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?category=jaket&gender=men" class="dropdown-item" class="dropdown-item">Men's</a>
                                <a href="shop.php?category=jaket&gender=women" class="dropdown-item" class="dropdown-item">Women's</a>
                        </div>
                        
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                                            <div style="display: flex; align-items: center;">
                        <img src="img/logo.jpg" alt="Logo" 
                            style="height: 56px; width: auto; margin-right: 10px;" 
                            class="border" />
                        <h1 class="m-0 display-5 font-weight-semi-bold">Effort Outdoor</h1>
                        </div>                 </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bantuan</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="faq.php" class="dropdown-item">FAQs</a>
                                    <a href="checkout.php" class="dropdown-item">Help</a>
                                    <a href="checkout.php" class="dropdown-item">Support</a>
                                </div>
                        </div>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="login.php" class="nav-item nav-link">Login</a>
                            <a href="register.php" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="https://i.pinimg.com/1200x/0c/52/ae/0c52ae9947137589b5574a0a515bc451.jpg" alt="Mountain">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="shop.php" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="https://i.pinimg.com/1200x/74/59/72/745972dd72ab4dc194afd2e47943578b.jpg" alt="Mountain">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="shop.php" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
 
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <!-- First row: 3 categories -->
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="shop.php" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="https://i.pinimg.com/1200x/ca/0f/fa/ca0ffa997170368b8466ff40fcfddf04.jpg" alt=""
                        style="width: 100%; height: 500px; object-fit: cover;">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Celana Panjang</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="shop.php" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="https://i.pinimg.com/736x/b0/4d/ab/b04dab7548579c4c12a6af8484f50842.jpg" alt="" 
                        style="width: 100%; height: 500px; object-fit: cover;">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Celana Pendek</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">15 Products</p>
                    <a href="shop.php" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="https://i.pinimg.com/736x/cd/38/45/cd3845a5c0e0d5d35043b1e483282822.jpg" alt=""
                        style="width: 100%; height: 500px; object-fit: cover;">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Jaket</h5>
                </div>
            </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Man Collection</h1>
                        <a href="shop.php" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Women Collection</h1>
                        <a href="shop.php" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->




    <!-- Products Start -->
<?php include 'newproducts.php'; ?>
    <!-- Products End -->


    <!-- Vendor Start -->
   
    <!-- Vendor End -->


    <!-- Footer Start -->
    <?php include 'partials/footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
   