<<<<<<< HEAD
<!-- Navbar Start -->
    <div class="container-fluid mb-3">
=======
<div class="container-fluid">
>>>>>>> idhamarbi
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" onclick="event.preventDefault();" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
<<<<<<< HEAD
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical">
                    <div class="navbar-nav w-100" style="height: 410px; overflow-y: auto;">
                        <div class="nav-item">
                            <a href="#cat-jaket" class="nav-link d-flex justify-content-between" data-toggle="collapse" aria-expanded="false" onclick="event.preventDefault();">Jaket Outdoor <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="collapse" id="cat-jaket">
                                <a href="" class="dropdown-item pl-4">Jaket Gunung</a>
                                <a href="" class="dropdown-item pl-4">Jaket Casual</a>
                                <a href="" class="dropdown-item pl-4">Jaket Windbreaker</a>
                            </div>
                        </div>
                        <div class="nav-item">
                            <a href="#cat-celana" class="nav-link d-flex justify-content-between" data-toggle="collapse" aria-expanded="false" onclick="event.preventDefault();">Celana Outdoor <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="collapse" id="cat-celana">
                                <a href="" class="dropdown-item pl-4">Celana Cargo Panjang</a>
                                <a href="" class="dropdown-item pl-4">Celana Pendek Outdoor</a>
                            </div>
                        </div>
=======
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">celana Panjang <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's</a>
                                <a href="" class="dropdown-item">Women's</a>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    Celana Pendek <i class="fa fa-angle-down float-right mt-1"></i>
                                </a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's</a>
                                <a href="" class="dropdown-item">Women's</a>
                                </div>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Jackets</a>
>>>>>>> idhamarbi
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
<<<<<<< HEAD
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Effort Outdoor</h1>
                        <p class="small m-0">Thrift & Preloved</p>
=======
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
>>>>>>> idhamarbi
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <?php $__current = basename($_SERVER['PHP_SELF']); ?>
                        <div class="navbar-nav mr-auto py-0">
<<<<<<< HEAD
                                    <a href="index.php" class="nav-item nav-link <?php echo $__current === 'index.php' ? 'active' : ''; ?>">Home</a>
                                    <a href="shop.php" class="nav-item nav-link <?php echo in_array($__current, ['shop.php']) ? 'active' : ''; ?>">Catalog</a>
                                    <a href="detail.php" class="nav-item nav-link <?php echo in_array($__current, ['detail.php']) ? 'active' : ''; ?>">Item Detail</a>
=======
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="detail.php" class="nav-item nav-link">Shop Detail</a>
>>>>>>> idhamarbi
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
<<<<<<< HEAD
                                    <a href="promo.php" class="dropdown-item">Consign With Us</a>
=======
>>>>>>> idhamarbi
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a href="login.php" class="nav-item nav-link">Login</a>
                            <a href="register.php" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
<<<<<<< HEAD
                </nav>    
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Find Unique thrift</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Sustainable Outdoor Finds</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Browse Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Sourced with Care</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Quality Preowned Pieces</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Explore</a>
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
=======
                </nav>
>>>>>>> idhamarbi
            </div>
        </div>
    </div>